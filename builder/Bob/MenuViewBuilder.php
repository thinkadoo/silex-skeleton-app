<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class MenuViewBuilder extends BaseBuilder
{
    function __construct($entityList)
    {
        parent::__construct();

        $this->setOutputName('menu.twig');
        $this->setVariable('items', array_combine($entityList, $entityList));

        $generateAppBootstrap = new Generator();
        $generateAppBootstrap->setTemplateDirs(array(__DIR__.'/Work/MenuViewTemplate/',));
        $generateAppBootstrap->setMustOverwriteIfExists(true);

        $generateAppBootstrap->addBuilder($this);

        $generateAppBootstrap->writeOnDisk(__DIR__.'/../../views/');
        print("# Done Generating Menu Template File ;) \n");
    }
}