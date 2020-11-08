<?php

declare(strict_types=1);

namespace EndomondoMv\Commands;

use DateInterval;
use DateTime;
use DateTimeZone;
use EndomondoMv\Migrate\Application\Factory\ClientsFactory;
use EndomondoMv\Migrate\Application\MigrationService;
use Exception;
use Fabulator\Endomondo\EndomondoApi;
use GuzzleHttp\Client;
use Swagger\Client\Strava\Api\UploadsApi;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class EndomondoMigrateCommand extends Command
{
    // TODO mv to one file
    private const DATE_FORMAT = 'Y-m-d H:i:s';

    protected static $defaultName = 'endomondo:migrate';

    protected function configure()
    {
        $this->addOption('code', 'c', InputArgument::OPTIONAL, 'Code form https://oauth.jszewczak.com/code.php');
        $this->addOption('token', 't', InputArgument::OPTIONAL, '');

        $this->addOption(
            'startImport',
            's',
            InputArgument::OPTIONAL,
            'start import date in format ' . self::DATE_FORMAT
        );
        $this->addOption('endImport', 'e', InputArgument::OPTIONAL, 'end import date in format' . self::DATE_FORMAT);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $code = $input->getOption('code');
        $token = $input->getOption('token');

        $startImport = $input->getOption('startImport');
        $endImport = $input->getOption('endImport');

        /** @var $endomondoApi EndomondoApi */
        [$endomondoApi, $stravaApi, $config, $account] = ClientsFactory::createApiClients($code, $token);

        $migrationService = new MigrationService($output, new UploadsApi(new Client(), $config), $stravaApi);

        if (!is_null($startImport)) {
            list($from, $to, $endImport) = $this->createFromInput($startImport, $endImport);
        } else {
            list($from, $to, $endImport) = $this->createFromToFromEndomondo($account, $output);
        }

        while ($to <= $endImport && $from < $endImport) {
            $output->writeln($from->format(self::DATE_FORMAT) . ' -> ' . $to->format(self::DATE_FORMAT) . ' end: ' . $endImport->format(self::DATE_FORMAT));

            $endomondoWorkouts = $endomondoApi->getWorkoutsFromTo($from, $to);

            foreach ($endomondoWorkouts['workouts'] as $endomondoWorkout) {
                $result = $migrationService->migrateWorkout($endomondoWorkout);

                if ($result === Command::FAILURE) {
                    return $result;
                }
            }

            $from->add(new DateInterval('P1MT1S'));
            if ((clone $from)->add(new DateInterval('P1MT1S')) < $endImport) {
                $to = (clone $from)->add(new DateInterval('P1M'));
            } else {
                $to = $endImport;
            }
        }

        return Command::SUCCESS;
    }

    /**
     * @param $account
     * @param OutputInterface $output
     * @return array
     * @throws Exception
     */
    protected function createFromToFromEndomondo($account, OutputInterface $output): array
    {
        // TODO mv to one service

        $from = new DateTime($account['created_date'], new DateTimeZone('UTC'));
        $output->writeln('Import from: ' . $from->format(self::DATE_FORMAT));

        $to = (clone $from)->add(new DateInterval('P1M'));

        $endImport = (new DateTime('now'))->add(new DateInterval('PT1H'));
        $output->writeln('End Import on: ' . $endImport->format(self::DATE_FORMAT));

        return [$from, $to, $endImport];
    }

    /**
     * @param $startImport
     * @param $endImport
     * @return array
     */
    private function createFromInput($startImport, $endImport): array
    {
        $from = DateTime::createFromFormat(self::DATE_FORMAT, $startImport, new DateTimeZone('UTC'));
        $endImport = DateTime::createFromFormat(self::DATE_FORMAT, $endImport, new DateTimeZone('UTC'));

        if ((clone $from)->add(new DateInterval('P1MT1S')) < $endImport) {
            $to = (clone $from)->add(new DateInterval('P1M'));
        } else {
            $to = $endImport;
        }

        return [$from, $to, $endImport];
    }

}
