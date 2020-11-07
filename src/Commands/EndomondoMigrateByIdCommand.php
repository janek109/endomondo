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

class EndomondoMigrateByIdCommand extends Command
{
    // TODO mv to one file
    private const DATE_FORMAT = 'Y-m-d H:i:s';

    protected static $defaultName = 'endomondo:migrate';

    protected function configure()
    {
        $this->addOption('code', 'c', InputArgument::OPTIONAL, 'Code form https://oauth.jszewczak.com/code.php');
        $this->addOption('token', 't', InputArgument::OPTIONAL, '');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $code = $input->getOption('code');
        $token = $input->getOption('token');

        /** @var $endomondoApi EndomondoApi */
        [$endomondoApi, $stravaApi, $config, $account] = ClientsFactory::createApiClients($code, $token);

        $migrationService = new MigrationService($output, new UploadsApi(new Client(), $config), $stravaApi);

            $endomondoWorkouts = $endomondoApi->getWorkoutsFromTo($from, $to); // get by Id

            foreach ($endomondoWorkouts['workouts'] as $endomondoWorkout) {
                $result = $migrationService->migrateOneWorkout($endomondoWorkout);

                if ($result === Command::FAILURE) {
                    return $result;
                }
            }

        return Command::SUCCESS;
    }

}
