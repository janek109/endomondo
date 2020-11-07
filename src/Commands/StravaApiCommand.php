<?php

declare(strict_types=1);

namespace EndomondoMv\Commands;

use EndomondoMv\Migrate\Application\Factory\ClientsFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StravaApiCommand extends Command
{
    protected static $defaultName = 'strava:getToken';

    protected function configure(): void
    {
        $this->addOption('code', 'c', InputArgument::OPTIONAL, 'Code form https://oauth.jszewczak.com/code.php');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $code = $input->getOption('code');
        ClientsFactory::createApiClients($code);

        return Command::SUCCESS;
    }
}
