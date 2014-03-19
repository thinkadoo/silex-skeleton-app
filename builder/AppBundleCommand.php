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
require_once 'Bob/AppConfigDevBuilder.php';
require_once 'Bob/AppConfigProdBuilder.php';
require_once 'Bob/AppConfigTestBuilder.php';
require_once 'Bob/ViewBuilder.php';
require_once 'config/Repo.php';

require_once 'Bob/ControllerTestBuilder.php';
require_once 'Bob/ControllerCoreTestBuilder.php';
require_once 'Bob/RepositoryCoreTestBuilder.php';
require_once 'Bob/RepositoryTestBuilder.php';
require_once 'Bob/DBTestBuilder.php';
require_once 'Bob/SeedTestBuilder.php';
require_once 'Bob/TestsBootstrapBuilder.php';
require_once 'Bob/MenuViewBuilder.php';

use Bob\ControllerBuilder;
use Bob\ControllerCoreBuilder;
use Bob\RepositoryCoreBuilder;
use Bob\RepositoryBuilder;
use Bob\DbBuilder;
use Bob\DBMigrationBuilder;
use Bob\TravisBuilder;
use Bob\AppControllerBuilder;
use Bob\AppBootstrapBuilder;
use Bob\MenuViewBuilder;
use Bob\ViewBuilder;
use Bob\AppConfigDevBuilder;
use Bob\AppConfigProdBuilder;
use Bob\AppConfigTestBuilder;

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
use PDO;

class AppBundleCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('generate:appbundle')
            ->setDescription('Generate a rest bundle')
            ->addArgument(
                'name',
                InputArgument::OPTIONAL,
                'What rest class do you want to generate?'
            )
            ->addArgument(
                'properties',
                InputArgument::IS_ARRAY,
                'What are the properties of the rest class?'
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

        $go = $repo->checkResevedTerms($propertiesKeysValues);

        if(!$go){
            die("Sorry thats not allowed! \n");
        }

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
        $bobMenuViewFile = new MenuViewBuilder($allEntities);
        $bobViewFile = new ViewBuilder($allEntities,$className);
        $bobAppConfigDevBuilder = new AppConfigDevBuilder($allEntities);
        $bobAppConfigProdBuilder = new AppConfigProdBuilder($allEntities);
        $bobAppConfigTestBuilder = new AppConfigTestBuilder($allEntities);

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

            // before you can run any migration - you need to drop the table that that migration affects
            $tableToRemove = strtolower($className);

            $db = new PDO('mysql:host=localhost;dbname=restdb', 'root', '');
            $dropTable = $db->prepare("DROP TABLE IF EXISTS $tableToRemove");
            $dropTable->execute();

            $dbtest = new PDO('mysql:host=localhost;dbname=resttestdb', 'root', '');
            $dropTestTable = $dbtest->prepare("DROP TABLE IF EXISTS $tableToRemove");
            $dropTestTable->execute();

            chdir(__DIR__ .'/../db/restdb/');
            exec('php ./doctrine-migrations.phar migrations:status');
            exec('php ./doctrine-migrations.phar migrations:migrate --no-interaction');

            chdir('../');
            chdir('resttestdb');
            exec('php ./doctrine-migrations.phar migrations:status');
            exec('php ./doctrine-migrations.phar migrations:migrate --no-interaction');
            print_r("# Done Migrating your Databases to this Entity version ;) \n");
        }

        if ($sql)
        {
            $currentEntities = $repo->getExistingEntities();
            $bobDbFile = new DbBuilder($currentEntities);
        }

        if ($travis)
        {
            $currentEntities = $repo->getExistingEntities();
            $bobTravisFile = new TravisBuilder($currentEntities);
        }
    }
}