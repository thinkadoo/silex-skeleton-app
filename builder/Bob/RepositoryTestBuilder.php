<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class RepositoryTestBuilder extends BaseBuilder
{
    function __construct($entityList, $config, $className, $properties)
    {
        parent::__construct();

        $phpVersion = $config['phpVersion'];
        $category = $config['category'];
        $organisation = $config['organisation'];
        $author = $config['author'];
        $authorEmail = $config['authorEmail'];
        $organisationWebSite = $config['organisationWebSite'];
        $repository = $config['repository'];

        $nameSpace = $className. '\\Tests\\' . $className . 'Bundle\\Repository';
        $moduleName = $className;

        $this->setOutputName($className.'RepositoryTest.php');

        $this->setVariable('phpVersion', $phpVersion);
        $this->setVariable('category', $category);
        $this->setVariable('author', $author);
        $this->setVariable('organisation', $organisation);
        $this->setVariable('organisationWebSite', $organisationWebSite);
        $this->setVariable('repository', $repository);

        $this->setVariable('className', $className);
        $this->setVariable('properties', $properties);
        $this->setVariable('tableName', strtolower($className));
        $this->setVariable('extends', '\\PHPUnit_Extensions_Database_TestCase');
        $this->setVariable('moduleName', $moduleName);
        $this->setVariable('author', $author);
        $this->setVariable('authorEmail', $authorEmail);

        $generateRepositoryCoreTestFile = new Generator();
        $generateRepositoryCoreTestFile->setTemplateDirs(array(__DIR__.'/Work/TestRepositoryTemplate/',));
        $generateRepositoryCoreTestFile->setMustOverwriteIfExists(true);
        $generateRepositoryCoreTestFile->setVariables(array('namespace' => $nameSpace,));

        $generateRepositoryCoreTestFile->addBuilder($this);
        $generateRepositoryCoreTestFile->writeOnDisk(__DIR__.'/../../tests/'.$className.'/Tests/'.$className.'Bundle/Repository/');
        print("# Done Generating Test file ".$className."RepositoryTest ;) \n");

    }
}