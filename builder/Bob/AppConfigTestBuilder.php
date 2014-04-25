<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class AppConfigTestBuilder extends BaseBuilder
{
    function __construct($entityList, $config)
    {
        parent::__construct();

        $this->setOutputName('test.php');
        $this->setVariable('items', array_combine($entityList, $entityList));

        $db = $config['db'];
        $this->setVariable('driver', $db['driver']);
        $this->setVariable('dbname', $db['dbname']);
        $this->setVariable('testdbname', $db['testdbname']);
        $this->setVariable('host', $db['host']);
        $this->setVariable('user', $db['user']);
        $this->setVariable('password', $db['password']);
        $this->setVariable('port', $db['port']);

        $generateAppBootstrap = new Generator();
        $generateAppBootstrap->setTemplateDirs(array(__DIR__.'/Work/AppConfigTestBuilder/',));
        $generateAppBootstrap->setMustOverwriteIfExists(true);

        $generateAppBootstrap->addBuilder($this);

        $generateAppBootstrap->writeOnDisk(__DIR__.'/../../app/config');
        print("# Done Generating App Config Test File ;) \n");
    }
}