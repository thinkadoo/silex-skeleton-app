<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();

    $loader->registerNamespace('Renderer', __DIR__.'/../lib');
    $loader->registerNamespace('Party', __DIR__.'/../src');
    $loader->registerNamespace('PartyRelationship', __DIR__.'/../src');
    $loader->registerNamespace('PartyRole', __DIR__.'/../src');

$loader->register();

return $loader;