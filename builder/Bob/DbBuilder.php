<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class DbBuilder extends BaseBuilder
{
    function __construct($entities, $className, $properties)
    {
        parent::__construct();

        $this->setOutputName('db.sql');
        $this->setVariable('entities', array_combine($entities, $entities));
        $this->setVariable('className', $className);
        $this->setVariable('properties', $properties);

        $generateDb = new Generator();
        $generateDb->setTemplateDirs(array(__DIR__.'/Work/DbTemplate/',));
        $generateDb->setMustOverwriteIfExists(true);

        $generateDb->addBuilder($this);

        $generateDb->writeOnDisk(__DIR__.'/../../db/');
        print_r("# Done Generating Database ;) \n");
    }
}