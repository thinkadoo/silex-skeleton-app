<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class SeedTestBuilder extends BaseBuilder
{
    function __construct($className, $properties)
    {
        parent::__construct();

        $this->setOutputName('seed'.$className.'.yml');

        $this->setVariable('properties', $properties);
        $this->setVariable('className', $className);
        $this->setVariable('tableName', strtolower($className));

        $generateYmlFile = new Generator();
        $generateYmlFile->setTemplateDirs(array(__DIR__.'/Work/TestDataSetTemplate/',));
        $generateYmlFile->setMustOverwriteIfExists(true);

        $generateYmlFile->addBuilder($this);
        $generateYmlFile->writeOnDisk(__DIR__.'/../../tests/'.$className.'/Tests/DataSet/'.$className.'/');
        print("# Done Generating YML Seed Data file ".$className." ;) \n");
    }
}