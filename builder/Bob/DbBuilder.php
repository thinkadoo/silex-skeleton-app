<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class DbBuilder extends BaseBuilder
{
    function __construct($entityList)
    {
        parent::__construct();

        $this->setOutputName('db.sql');
        $this->setVariable('items', array_combine($entityList, $entityList));

        $generateDb = new Generator();
        $generateDb->setTemplateDirs(array(__DIR__.'/Work/DbTemplate/',));
        $generateDb->setMustOverwriteIfExists(true);

        $generateDb->addBuilder($this);

        $generateDb->writeOnDisk(__DIR__.'/../../db/');
        print_r("# Done Generating Database ;) \n");
    }
}