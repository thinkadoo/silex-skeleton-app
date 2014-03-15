<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class ControllerBuilder extends BaseBuilder
{

    function __construct($entityList, $config, $className)
    {
        parent::__construct();

        $nameSpace = $className. '\\' . $className . 'Bundle\\Controller';
        $moduleName = $className;
        $phpVersion = $config['phpVersion'];
        $category = $config['category'];
        $organisation = $config['organisation'];
        $author = $config['author'];
        $authorEmail = $config['authorEmail'];
        $organisationWebSite = $config['organisationWebSite'];
        $repository = $config['repository'];

        $this->setOutputName($className.'Controller.php');

        $this->setVariable('phpVersion', $phpVersion);
        $this->setVariable('category', $category);
        $this->setVariable('author', $author);
        $this->setVariable('organisation', $organisation);
        $this->setVariable('organisationWebSite', $organisationWebSite);
        $this->setVariable('repository', $repository);

        $this->setVariable('className', $className);
        $this->setVariable('fieldName', strtolower($className));
        $this->setVariable('extends', 'ControllerCore');
        $this->setVariable('moduleName', $moduleName);
        $this->setVariable('author', $author);
        $this->setVariable('authorEmail', $authorEmail);

        $generateController = new Generator();
        $generateController->setTemplateDirs(array(__DIR__.'/Work/ControllerTemplate/',));
        $generateController->setMustOverwriteIfExists(true);
        $generateController->setVariables(array('namespace' => $nameSpace,));

        $generateController->addBuilder($this);

        $generateController->writeOnDisk(__DIR__.'/../../src/'.$className.'/'.$className.'Bundle/Controller');
        print("# Done Generating Controller ".$className." ;) \n");
    }
}