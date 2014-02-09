<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class RepositoryTestBuilder extends BaseBuilder
{
    function __construct($entityList, $config, $className)
    {
        parent::__construct();

        $phpVersion = $config['phpVersion'];
        $category = $config['category'];
        $organisation = $config['organisation'];
        $author = $config['author'];
        $authorEmail = $config['authorEmail'];
        $corganisationWebSite = $config['corganisationWebSite'];
        $repository = $config['repository'];

        $nameSpace = $className. '\\Tests\\' . $className . 'Bundle\\Core';
        $moduleName = $className;

        $this->setOutputName($className.'RepositoryCoreTest.php');

        $this->setVariable('phpVersion', $phpVersion);
        $this->setVariable('category', $category);
        $this->setVariable('author', $author);
        $this->setVariable('organisation', $organisation);
        $this->setVariable('organisationWebSite', $corganisationWebSite);
        $this->setVariable('repository', $repository);

        $this->setVariable('className', $className);
        $this->setVariable('tableName', strtolower($className));
        $this->setVariable('extends', '\\PHPUnit_Extensions_Database_TestCase');
        $this->setVariable('moduleName', $moduleName);
        $this->setVariable('author', $author);
        $this->setVariable('authorEmail', $authorEmail);

        $generateRepositoryCoreTestFile = new Generator();
        $generateRepositoryCoreTestFile->setTemplateDirs(array(__DIR__.'/Work/RepositoryTemplate/',));
        $generateRepositoryCoreTestFile->setMustOverwriteIfExists(true);
        $generateRepositoryCoreTestFile->setVariables(array('namespace' => $nameSpace,));

        $generateRepositoryCoreTestFile->addBuilder($this);
        $generateRepositoryCoreTestFile->writeOnDisk(__DIR__.'/../../tests/'.$className.'/Tests/'.$className.'Bundle/Core/');
        print("# Done Generating Test file ".$className."RepositoryCoreTest ;) \n");
    }
}