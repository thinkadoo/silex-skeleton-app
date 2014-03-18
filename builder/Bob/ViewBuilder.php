<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class ViewBuilder extends BaseBuilder
{

    function __construct($entityList, $className)
    {
        parent::__construct();

        $this->setOutputName(strtolower($className).'.twig');

        $this->setVariable('className', $className);

        $generateController = new Generator();
        $generateController->setTemplateDirs(array(__DIR__.'/Work/ViewTemplate/',));
        $generateController->setMustOverwriteIfExists(true);

        $generateController->addBuilder($this);

        $generateController->writeOnDisk(__DIR__.'/../../src/'.$className.'/'.$className.'Bundle/View');
        print("# Done Generating View ".$className." ;) \n");
    }
}