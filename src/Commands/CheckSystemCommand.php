<?php

declare(strict_types=1);

namespace EndomondoMv\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CheckSystemCommand extends Command
{
    protected static $defaultName = 'check';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('All ok thx for using my software');

        return Command::SUCCESS;
    }
}
