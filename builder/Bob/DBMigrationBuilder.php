<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class DBMigrationBuilder extends BaseBuilder
{
    function __construct($tableName, $properties)
    {
        parent::__construct();

        $className = 'Version'.time();
        $filenameName = $className.'.php';

        $this->setOutputName($filenameName);
        $this->setVariable('properties', $properties);
        $this->setVariable('className', $className);
        $this->setVariable('tableName', $tableName);

        $generateDb = new Generator();
        $generateDb->setTemplateDirs(array(__DIR__.'/Work/DbMigrationTemplate/',));
        $generateDb->setMustOverwriteIfExists(true);

        $generateDb->addBuilder($this);

        $generateDb->writeOnDisk(__DIR__.'/../../db/restdb/migrations');
        print_r("# Done Generating Database Migration ;) \n");
    }
}