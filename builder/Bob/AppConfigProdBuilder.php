<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class AppConfigProdBuilder extends BaseBuilder
{
    function __construct($entityList)
    {
        parent::__construct();

        $this->setOutputName('prod.php');
        $this->setVariable('items', array_combine($entityList, $entityList));

        $generateAppBootstrap = new Generator();
        $generateAppBootstrap->setTemplateDirs(array(__DIR__.'/Work/AppConfigProdBuilder/',));
        $generateAppBootstrap->setMustOverwriteIfExists(true);

        $generateAppBootstrap->addBuilder($this);

        $generateAppBootstrap->writeOnDisk(__DIR__.'/../../app/config');
        print("# Done Generating App Config Prod File ;) \n");
    }
}