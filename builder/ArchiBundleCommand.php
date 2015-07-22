<?php

namespace Builder;

require_once 'loader.php';

use Silex\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use PDO;

class ArchiBundleCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('generate:archibundle')
            ->setDescription('Generate a Mobile app from Archi Data')
            ->addArgument(
                'archiModelFolder',
                InputArgument::REQUIRED,
                'What rest class do you want to generate?'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $archiModelFolder = $input->getArgument('archiModelFolder');

        $reader = new \EasyCSV\Reader( __DIR__ . '/' . $archiModelFolder.'/'.'elements.csv');
        $elements = $reader->getAll();
        print_r("elements = \n");
        print_r($elements);

        $reader = new \EasyCSV\Reader( __DIR__ . '/' . $archiModelFolder.'/'.'relations.csv');
        $relations = $reader->getAll();
        print_r("relations = \n");
        print_r($relations);

        $reader = new \EasyCSV\Reader( __DIR__ . '/' . $archiModelFolder.'/'.'properties.csv');
        $properties = $reader->getAll();
        print_r("properties = \n");
        print_r($properties);

    }
}