<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class DBMigrationBuilder extends BaseBuilder
{
    function __construct($entityList)
    {
        parent::__construct();

        $className = 'Version'.time();
        $filenameName = $className.'.php';

        $this->setOutputName($filenameName);
        $this->setVariable('items', array_combine($entityList, $entityList));
        $this->setVariable('className', $className);

        $generateDb = new Generator();
        $generateDb->setTemplateDirs(array(__DIR__.'/Work/DbMigrationTemplate/',));
        $generateDb->setMustOverwriteIfExists(true);

        $generateDb->addBuilder($this);

        $generateDb->writeOnDisk(__DIR__.'/../../db/restdb/migrations');
        print_r("# Done Generating Database Migration ;) \n");
    }
}