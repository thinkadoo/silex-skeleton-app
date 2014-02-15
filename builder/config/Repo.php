<?php

namespace config;


class Repo
{
    var $config = array(
    'phpVersion' => "5.3.21",
    'category' => 'Api_Rest_Implementation',
    'organisation' => 'Thinkadoo',
    'author' => 'Andre Venter',
    'authorEmail' => 'andre.n.venter@gmail.com',
    'corganisationWebSite' => 'http://think-a-doo.net',
    'repository' => 'https://github.com/thinkadoo/silex-skeleton-rest.git'
    );

    public function getExistingClasses($dir)
    {
        $entitiesExist  = scandir($dir);
        $throwAway      = array_shift($entitiesExist);
        $throwAway      = array_shift($entitiesExist);
        //$throwAway      = array_shift($entitiesExist);
        return $entitiesExist;
    }

    public function getSourceDirectory()
    {
        return __DIR__ . '/../../src/';
    }
} 