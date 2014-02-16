<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class ControllerTestBuilder extends BaseBuilder
{
    function __construct($entityList, $config, $className, $properties)
    {
        parent::__construct();

        $phpVersion = $config['phpVersion'];
        $category = $config['category'];
        $organisation = $config['organisation'];
        $author = $config['author'];
        $authorEmail = $config['authorEmail'];
        $corganisationWebSite = $config['corganisationWebSite'];
        $repository = $config['repository'];

        $nameSpace = $className. '\\Tests\\' . $className . 'Bundle\\Controller';
        $moduleName = $className;

        $this->setOutputName($className.'ControllerTest.php');

        $this->setVariable('phpVersion', $phpVersion);
        $this->setVariable('category', $category);
        $this->setVariable('author', $author);
        $this->setVariable('organisation', $organisation);
        $this->setVariable('organisationWebSite', $corganisationWebSite);
        $this->setVariable('repository', $repository);

        $this->setVariable('className', $className);
        $this->setVariable('extends', 'WebTestCase');
        $this->setVariable('moduleName', $moduleName);
        $this->setVariable('author', $author);
        $this->setVariable('authorEmail', $authorEmail);

        $generateControllerTestFile = new Generator();
        $generateControllerTestFile->setTemplateDirs(array(__DIR__.'/Work/TestControllerTemplate/',));
        $generateControllerTestFile->setMustOverwriteIfExists(true);
        $generateControllerTestFile->setVariables(array('namespace' => $nameSpace,));

        $generateControllerTestFile->addBuilder($this);
        $generateControllerTestFile->writeOnDisk(__DIR__.'/../../tests/'.$className.'/Tests/'.$className.'Bundle/Controller/');
        print("# Done Generating Test file ".$className."ControllerTest ;) \n");
    }
}