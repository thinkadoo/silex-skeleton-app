<?php

namespace Builder;

require_once 'Bob/AppBootstrapBuilder.php';
require_once 'Bob/AppControllerBuilder.php';
require_once 'Bob/ControllerBuilder.php';
require_once 'Bob/ControllerCoreBuilder.php';
require_once 'Bob/DbBuilder.php';
require_once 'Bob/DBMigrationBuilder.php';
require_once 'Bob/RepositoryBuilder.php';
require_once 'Bob/RepositoryCoreBuilder.php';
require_once 'Bob/TravisBuilder.php';

use Bob\ControllerBuilder;
use Bob\ControllerCoreBuilder;
use Bob\RepositoryCoreBuilder;
use Bob\RepositoryBuilder;
use Bob\DbBuilder;
use Bob\DBMigrationBuilder;
use Bob\TravisBuilder;
use Bob\AppControllerBuilder;
use Bob\AppBootstrapBuilder;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BundleCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('generate:bundle')
            ->setDescription('Generate a bundle')
            ->addArgument(
                'name',
                InputArgument::OPTIONAL,
                'Who do you want to greet?'
            )
            ->addOption(
                'yell',
                null,
                InputOption::VALUE_NONE,
                'If set, the task will yell in uppercase letters'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        if ($name) {
            $text = 'Hello '.$name;
        } else {
            $text = 'Hello';
        }

        if ($input->getOption('yell')) {
            $text = strtoupper($text);
        }

        $output->writeln($text);
    }
}