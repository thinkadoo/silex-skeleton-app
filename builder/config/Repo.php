<?php

namespace config;

require_once __DIR__.'/../../vendor/autoload.php';

use Symfony\Component\Yaml\Parser;

class Repo
{
    var $config = array(
    'phpVersion' => "5.3.21",
    'category' => 'Api_Rest_Implementation',
    'organisation' => 'Thinkadoo',
    'author' => 'Andre Venter',
    'authorEmail' => 'andre.n.venter@gmail.com',
    'organisationWebSite' => 'http://think-a-doo.net',
    'repository' => 'https://github.com/thinkadoo/silex-skeleton-rest.git'
    );

    public function getExistingClasses($dir)
    {
        $entitiesExist  = scandir($dir);
        $throwAway      = array_shift($entitiesExist);
        $throwAway      = array_shift($entitiesExist);

        return $entitiesExist;
    }

    public function getSourceDirectory()
    {
        return __DIR__ . '/../../src/';
    }

    public function getExistingEntities()
    {
        $entitiesFolders  = scandir($this->getSourceDirectory());
        $yaml = new Parser();
        $entitiesWithProperties = array();

        $throwAway = array_shift($entitiesFolders);
        $throwAway = array_shift($entitiesFolders);

        foreach($entitiesFolders as $folder)
        {
            $value = $yaml->parse(file_get_contents(__DIR__.'/../../tests/'.$folder.'/Tests/DataSet/'.$folder.'/seed'.$folder.'.yml'));
            $entitiesWithProperties[] = $value;
        }

        return $entitiesWithProperties;
    }
} 