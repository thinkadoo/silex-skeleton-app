<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class AppControllerBuilder extends BaseBuilder
{
    function __construct($entityList)
    {
        parent::__construct();

        $this->setOutputName('controller.php');
        $this->setVariable('items', array_combine($entityList, $entityList));

        $generateAppController = new Generator();
        $generateAppController->setTemplateDirs(array(__DIR__.'/Work/AppControllerBuilder/',));
        $generateAppController->setMustOverwriteIfExists(true);

        $generateAppController->addBuilder($this);

        $generateAppController->writeOnDisk(__DIR__.'/../../app/');
        print_r("# Done Generating App Controller File ;) \n");
    }
}