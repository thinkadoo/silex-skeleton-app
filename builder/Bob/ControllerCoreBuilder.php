<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class ControllerCoreBuilder extends BaseBuilder
{
    function __construct($entityList, $config, $className)
    {
        parent::__construct();

        $phpVersion = $config['phpVersion'];
        $category = $config['category'];
        $organisation = $config['organisation'];
        $author = $config['author'];
        $authorEmail = $config['authorEmail'];
        $organisationWebSite = $config['organisationWebSite'];
        $repository = $config['repository'];

        $nameSpace = $className. '\\' . $className . 'Bundle\\Core';
        $moduleName = $className;

        $this->setOutputName('ControllerCore.php');

        $this->setVariable('phpVersion', $phpVersion);
        $this->setVariable('category', $category);
        $this->setVariable('author', $author);
        $this->setVariable('organisation', $organisation);
        $this->setVariable('organisationWebSite', $organisationWebSite);
        $this->setVariable('repository', $repository);

        $this->setVariable('className', $className);
        $this->setVariable('fieldName', strtolower($className));
        $this->setVariable('implements', 'ControllerProviderInterface');
        $this->setVariable('moduleName', $moduleName);
        $this->setVariable('author', $author);
        $this->setVariable('authorEmail', $authorEmail);

        $generateCoreController = new Generator();
        $generateCoreController->setTemplateDirs(array(__DIR__.'/Work/ControllerCoreTemplate/',));
        $generateCoreController->setMustOverwriteIfExists(true);
        $generateCoreController->setVariables(array('namespace' => $nameSpace,));

        $generateCoreController->addBuilder($this);

        $generateCoreController->writeOnDisk(__DIR__.'/../../src/'.$className.'/'.$className.'Bundle/Core');
        print("# Done Generating Controller Core ".$className." ;) \n");


    }
}