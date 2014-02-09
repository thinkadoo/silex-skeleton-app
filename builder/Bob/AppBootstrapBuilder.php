<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class AppBootstrapBuilder extends BaseBuilder
{
    function __construct($entityList)
    {
        parent::__construct();

        $this->setOutputName('bootstrap.php');
        $this->setVariable('items', array_combine($entityList, $entityList));

        $generateAppBootstrap = new Generator();
        $generateAppBootstrap->setTemplateDirs(array(__DIR__.'/Work/AppBootstrapBuilder/',));
        $generateAppBootstrap->setMustOverwriteIfExists(true);

        $generateAppBootstrap->addBuilder($this);

        $generateAppBootstrap->writeOnDisk(__DIR__.'/../../app/');
        print("# Done Generating App Bootstrap File ;) \n");
    }
}