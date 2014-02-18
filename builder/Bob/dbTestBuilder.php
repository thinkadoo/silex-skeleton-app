<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class DbTestBuilder extends BaseBuilder
{
    function __construct($entityList, $config, $className)
    {
        parent::__construct();

        $phpVersion = $config['phpVersion'];
        $category = $config['category'];
        $organisation = $config['organisation'];
        $author = $config['author'];
        $authorEmail = $config['authorEmail'];
        $organisationWebSite = $config['organisationWebSite'];
        $repository = $config['repository'];

        $moduleName = $className;

        $this->setOutputName('db.php');

        $this->setVariable('phpVersion', $phpVersion);
        $this->setVariable('category', $category);
        $this->setVariable('author', $author);
        $this->setVariable('organisation', $organisation);
        $this->setVariable('organisationWebSite', $organisationWebSite);
        $this->setVariable('repository', $repository);

        $this->setVariable('className', $className);
        $this->setVariable('tableName', strtolower($className));
        $this->setVariable('moduleName', $moduleName);
        $this->setVariable('author', $author);
        $this->setVariable('authorEmail', $authorEmail);

        $generateDbFile = new Generator();
        $generateDbFile->setTemplateDirs(array(__DIR__.'/Work/TestDbClassTemplate/',));
        $generateDbFile->setMustOverwriteIfExists(true);

        $generateDbFile->addBuilder($this);
        $generateDbFile->writeOnDisk(__DIR__.'/../../tests/'.$className.'/Tests/');
        print("# Done Generating db.php file ".$className." ;) \n");

    }
}