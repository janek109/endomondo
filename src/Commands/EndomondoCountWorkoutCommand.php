<?php

declare(strict_types=1);

namespace EndomondoMv\Commands;

use DateInterval;
use DateTime;
use DateTimeZone;
use Exception;
use EndomondoMv\Migrate\Application\Factory\ClientsFactory;
use Fabulator\Endomondo\EndomondoApi;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class EndomondoCountWorkoutCommand extends Command
{
    private const DATE_FORMAT = 'Y-m-d H:i:s';

    protected static $defaultName = 'endomondo:countWorkouts';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var $endomondoApi EndomondoApi */
        [$endomondoApi, $account] = ClientsFactory::createEndomondoApiClient();

        [$from, $to, $endMigrate] = $this->createFromToFromEndomondo($account, $output);

        $workoutCount = 0;

        while ($to < $endMigrate) {
            $endomondoWorkouts = $endomondoApi->getWorkoutsFromTo($from, $to);

            $workoutCountInMonth = count($endomondoWorkouts['workouts']);

            $output->writeln($from->format(self::DATE_FORMAT) . ' -> ' . $to->format(self::DATE_FORMAT) . ' workouts: ' . $workoutCountInMonth);

            $workoutCount += $workoutCountInMonth;

            $from->add(new DateInterval('P1MT1S'));
            $to = (clone $from)->add(new DateInterval('P1M'));
        }

        $output->writeln('Number of workouts: ' . $workoutCount);

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

        $endMigrate = (new DateTime('now'))->add(new DateInterval('P1M'));
        $output->writeln('End Migrate on: ' . $endMigrate->format(self::DATE_FORMAT));

        return array($from, $to, $endMigrate);
    }
}
