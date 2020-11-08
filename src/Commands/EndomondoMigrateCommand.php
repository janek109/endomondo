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
            'startMigrate',
            's',
            InputArgument::OPTIONAL,
            'start migrate date in format ' . self::DATE_FORMAT
        );
        $this->addOption('endMigrate', 'e', InputArgument::OPTIONAL, 'end migrate date in format' . self::DATE_FORMAT);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $code = $input->getOption('code');
        $token = $input->getOption('token');

        $startMigrate = $input->getOption('startMigrate');
        $endMigrate = $input->getOption('endMigrate');

        /** @var $endomondoApi EndomondoApi */
        [$endomondoApi, $stravaApi, $config, $account] = ClientsFactory::createApiClients($code, $token);

        $migrationService = new MigrationService($output, new UploadsApi(new Client(), $config), $stravaApi);

        if (!is_null($startMigrate)) {
            list($from, $to, $endMigrate) = $this->createFromInput($startMigrate, $endMigrate);
        } else {
            list($from, $to, $endMigrate) = $this->createFromToFromEndomondo($account, $output);
        }

        while ($to <= $endMigrate && $from < $endMigrate) {
            $output->writeln($from->format(self::DATE_FORMAT) . ' -> ' . $to->format(self::DATE_FORMAT) . ' end: ' . $endMigrate->format(self::DATE_FORMAT));

            $endomondoWorkouts = $endomondoApi->getWorkoutsFromTo($from, $to);

            foreach ($endomondoWorkouts['workouts'] as $endomondoWorkout) {
                $result = $migrationService->migrateWorkout($endomondoWorkout);

                if ($result === Command::FAILURE) {
                    return $result;
                }
            }

            $from->add(new DateInterval('P1MT1S'));
            if ((clone $from)->add(new DateInterval('P1MT1S')) < $endMigrate) {
                $to = (clone $from)->add(new DateInterval('P1M'));
            } else {
                $to = $endMigrate;
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
        $output->writeln('Migrate from: ' . $from->format(self::DATE_FORMAT));

        $to = (clone $from)->add(new DateInterval('P1M'));

        $endMigrate = (new DateTime('now'))->add(new DateInterval('PT1H'));
        $output->writeln('End Migrate on: ' . $endMigrate->format(self::DATE_FORMAT));

        return [$from, $to, $endMigrate];
    }

    /**
     * @param $startMigrate
     * @param $endMigrate
     * @return array
     */
    private function createFromInput($startMigrate, $endMigrate): array
    {
        $from = DateTime::createFromFormat(self::DATE_FORMAT, $startMigrate, new DateTimeZone('UTC'));
        $endMigrate = DateTime::createFromFormat(self::DATE_FORMAT, $endMigrate, new DateTimeZone('UTC'));

        if ((clone $from)->add(new DateInterval('P1MT1S')) < $endMigrate) {
            $to = (clone $from)->add(new DateInterval('P1M'));
        } else {
            $to = $endMigrate;
        }

        return [$from, $to, $endMigrate];
    }

}
