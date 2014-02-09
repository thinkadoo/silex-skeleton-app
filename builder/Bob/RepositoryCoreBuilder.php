<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class RepositoryCoreBuilder extends BaseBuilder
{
    function __construct($entityList, $config, $className)
    {
        parent::__construct();

        $phpVersion = $config['phpVersion'];
        $category = $config['category'];
        $organisation = $config['organisation'];
        $author = $config['author'];
        $authorEmail = $config['authorEmail'];
        $corganisationWebSite = $config['corganisationWebSite'];
        $repository = $config['repository'];

        $nameSpace = $className. '\\' . $className . 'Bundle\\Core';
        $moduleName = $className;

        $this->setOutputName('RepositoryCore.php');

        $this->setVariable('phpVersion', $phpVersion);
        $this->setVariable('category', $category);
        $this->setVariable('author', $author);
        $this->setVariable('organisation', $organisation);
        $this->setVariable('organisationWebSite', $corganisationWebSite);
        $this->setVariable('repository', $repository);

        $this->setVariable('className', $className);
        $this->setVariable('moduleName', $moduleName);
        $this->setVariable('author', $author);
        $this->setVariable('authorEmail', $authorEmail);

        $generateCoreRepository = new Generator();
        $generateCoreRepository->setTemplateDirs(array(__DIR__.'/Work/RepositoryCoreTemplate/',));
        $generateCoreRepository->setMustOverwriteIfExists(true);
        $generateCoreRepository->setVariables(array('namespace' => $nameSpace,));

        $generateCoreRepository->addBuilder($this);

        $generateCoreRepository->writeOnDisk(__DIR__.'/../../src/'.$className.'/'.$className.'Bundle/Core');
        print("# Done Generating Repository Core ".$className." ;) \n");


    }
}