<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class ControllerCoreTestBuilder extends BaseBuilder
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

        $nameSpace = $className. '\\Tests\\' . $className . 'Bundle\\Core';
        $moduleName = $className;

        $this->setOutputName($className.'ControllerCoreTest.php');

        $this->setVariable('phpVersion', $phpVersion);
        $this->setVariable('category', $category);
        $this->setVariable('author', $author);
        $this->setVariable('organisation', $organisation);
        $this->setVariable('organisationWebSite', $organisationWebSite);
        $this->setVariable('repository', $repository);

        $this->setVariable('className', $className);
        $this->setVariable('properties', $properties);
        $this->setVariable('tableName', strtolower($className));
        $this->setVariable('extends', 'WebTestCase');
        $this->setVariable('moduleName', $moduleName);
        $this->setVariable('author', $author);
        $this->setVariable('authorEmail', $authorEmail);

        $generateControllerCoreTestFile = new Generator();
        $generateControllerCoreTestFile->setTemplateDirs(array(__DIR__.'/Work/TestControllerCoreTemplate/',));
        $generateControllerCoreTestFile->setMustOverwriteIfExists(true);
        $generateControllerCoreTestFile->setVariables(array('namespace' => $nameSpace,));

        $generateControllerCoreTestFile->addBuilder($this);
        $generateControllerCoreTestFile->writeOnDisk(__DIR__.'/../../tests/'.$className.'/Tests/'.$className.'Bundle/Core/');
        print("# Done Generating Test file ".$className."RepositoryCoreTest ;) \n");
    }
}