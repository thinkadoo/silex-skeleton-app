<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class AppConfigProdBuilder extends BaseBuilder
{
    function __construct($entityList, $config)
    {
        parent::__construct();

        $this->setOutputName('prod.php');
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
        $generateAppBootstrap->setTemplateDirs(array(__DIR__.'/Work/AppConfigProdBuilder/',));
        $generateAppBootstrap->setMustOverwriteIfExists(true);

        $generateAppBootstrap->addBuilder($this);

        $generateAppBootstrap->writeOnDisk(__DIR__.'/../../app/config');
        print("# Done Generating App Config Prod File ;) \n");
    }
}