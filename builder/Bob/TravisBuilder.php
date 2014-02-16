<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class TravisBuilder extends BaseBuilder
{
    function __construct($entities, $className, $properties)
    {
        parent::__construct();

        $this->setOutputName('.travis.yml');
        $this->setVariable('entities', array_combine($entities, $entities));
        $this->setVariable('className', $className);
        $this->setVariable('properties', $properties);

        $generateTravis = new Generator();
        $generateTravis->setTemplateDirs(array(__DIR__.'/Work/TravisTemplate/',));
        $generateTravis->setMustOverwriteIfExists(true);

        $generateTravis->addBuilder($this);

        $generateTravis->writeOnDisk(__DIR__.'/../../');
        print("# Done Generating Travis File ;) \n");
    }
}