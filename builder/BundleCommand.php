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
require_once 'config/Repo.php';

require_once 'Bob/ControllerTestBuilder.php';
require_once 'Bob/ControllerCoreTestBuilder.php';
require_once 'Bob/RepositoryCoreTestBuilder.php';
require_once 'Bob/RepositoryTestBuilder.php';
require_once 'Bob/DBTestBuilder.php';
require_once 'Bob/SeedTestBuilder.php';
require_once 'Bob/TestsBootstrapBuilder.php';

use Bob\ControllerBuilder;
use Bob\ControllerCoreBuilder;
use Bob\RepositoryCoreBuilder;
use Bob\RepositoryBuilder;
use Bob\DbBuilder;
use Bob\DBMigrationBuilder;
use Bob\TravisBuilder;
use Bob\AppControllerBuilder;
use Bob\AppBootstrapBuilder;

use \Bob\ControllerTestBuilder;
use \Bob\ControllerCoreTestBuilder;
use \Bob\RepositoryCoreTestBuilder;
use \Bob\RepositoryTestBuilder;
use \Bob\DbTestBuilder;
use \Bob\SeedTestBuilder;
use \Bob\TestsBootstrapBuilder;

use config\Repo;
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
                'What class do you want to generate?'
            )
            ->addArgument(
                'properties',
                InputArgument::IS_ARRAY,
                'What are the properties of the class?'
            )
            ->addOption(
                'migration',
                null,
                InputOption::VALUE_NONE,
                'If set, generate migration files'
            )
            ->addOption(
                'sql',
                null,
                InputOption::VALUE_NONE,
                'If set, generate sql file'
            )
            ->addOption(
                'travis',
                null,
                InputOption::VALUE_NONE,
                'If set, generate travis file'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $className = $input->getArgument('name');
        $properties = $input->getArgument('properties');
        $migration = $input->getOption('migration');
        $sql = $input->getOption('sql');
        $travis = $input->getOption('travis');
        $entityList = array($className);

        $propertiesKeysValues = array();
        foreach ($properties as $pair) {
            list($key,$value) = explode(':', $pair);
            $propertiesKeysValues[$key]=str_replace(':','', $value);
        }

        $repo = new Repo();
        $config = $repo->config;
        $dir = $repo->getSourceDirectory();
        $entitiesExist = $repo->getExistingClasses($dir);
        $allEntities = array();
        $allEntities = array_merge($entitiesExist, $entityList);

        $bobCoreController = new ControllerCoreBuilder($allEntities, $config, $className);
        $bobController = new ControllerBuilder($allEntities, $config, $className);
        $bobCoreRepository = new RepositoryCoreBuilder($allEntities, $config, $className);
        $bobCoreRepository = new RepositoryBuilder($allEntities, $config, $className);
        $bobAppControllerFile = new AppControllerBuilder($allEntities);
        $bobAppBootstrapFile = new AppBootstrapBuilder($allEntities);

        $bobControllerTestFile = new ControllerTestBuilder($allEntities, $config, $className, $propertiesKeysValues);
        $bobControllerCoreTestFile = new ControllerCoreTestBuilder($allEntities, $config, $className, $propertiesKeysValues);
        $bobRepositoryCoreTestFile = new RepositoryCoreTestBuilder($allEntities, $config, $className, $propertiesKeysValues);
        $bobRepositoryTestFile = new RepositoryTestBuilder($allEntities, $config, $className, $propertiesKeysValues);
        $bobSeedFile = new SeedTestBuilder($className, $propertiesKeysValues);
        $bobDBFile = new DbTestBuilder($allEntities, $config, $className);
        $bobTestsBootstrapFile = new TestsBootstrapBuilder($allEntities);

        if ($migration)
        {
            $bobDbMigrationFile = new DBMigrationBuilder($className, $propertiesKeysValues);
        }

        if ($sql)
        {
            $currentEntities = $repo->getExistingEntities();
            $bobDbFile = new DbBuilder($currentEntities);
        }

        if ($travis)
        {
            $bobTravisFile = new TravisBuilder($allEntities, $className, $propertiesKeysValues);
        }
    }
}