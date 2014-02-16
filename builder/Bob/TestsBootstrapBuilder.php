<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class TestsBootstrapBuilder extends BaseBuilder
{
    function __construct($entityList)
    {
        parent::__construct();

        $this->setOutputName('bootstrap.php');
        $this->setVariable('items', array_combine($entityList, $entityList));

        $generateTestsBootstrap = new Generator();
        $generateTestsBootstrap->setTemplateDirs(array(__DIR__.'/Work/TestBootstrapTemplate/',));
        $generateTestsBootstrap->setMustOverwriteIfExists(true);

        $generateTestsBootstrap->addBuilder($this);

        $generateTestsBootstrap->writeOnDisk(__DIR__.'/../../tests/');
        print("# Done Generating Tests Bootstrap File ;) \n");
    }
}