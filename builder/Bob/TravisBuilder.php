<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class TravisBuilder extends BaseBuilder
{
    function __construct($entityList)
    {
        parent::__construct();

        $this->setOutputName('.travis.yml');
        $this->setVariable('items', array_combine($entityList, $entityList));

        $generateTravis = new Generator();
        $generateTravis->setTemplateDirs(array(__DIR__.'/Work/TravisTemplate/',));
        $generateTravis->setMustOverwriteIfExists(true);

        $generateTravis->addBuilder($this);

        $generateTravis->writeOnDisk(__DIR__.'/../../');
        print("# Done Generating Travis File ;) \n");
    }
}