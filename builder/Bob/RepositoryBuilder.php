<?php

namespace Bob;

use TwigGenerator\Builder\BaseBuilder;
use TwigGenerator\Builder\Generator;

class RepositoryBuilder extends BaseBuilder
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

        $nameSpace = $className. '\\' . $className . 'Bundle\\Repository';
        $moduleName = $className;

        $this->setOutputName($className.'Repository.php');

        $this->setVariable('phpVersion', $phpVersion);
        $this->setVariable('category', $category);
        $this->setVariable('author', $author);
        $this->setVariable('organisation', $organisation);
        $this->setVariable('organisationWebSite', $organisationWebSite);
        $this->setVariable('repository', $repository);

        $this->setVariable('className', $className);
        $this->setVariable('extends', 'RepositoryCore');
        $this->setVariable('moduleName', $moduleName);
        $this->setVariable('author', $author);
        $this->setVariable('authorEmail', $authorEmail);

        $generateCoreRepository = new Generator();
        $generateCoreRepository->setTemplateDirs(array(__DIR__.'/Work/RepositoryTemplate/',));
        $generateCoreRepository->setMustOverwriteIfExists(true);
        $generateCoreRepository->setVariables(array('namespace' => $nameSpace,));

        $generateCoreRepository->addBuilder($this);

        $generateCoreRepository->writeOnDisk(__DIR__.'/../../src/'.$className.'/'.$className.'Bundle/Repository');
        print("# Done Generating Repository ".$className." ;) \n");
    }
}