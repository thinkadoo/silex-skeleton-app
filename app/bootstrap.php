<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();

    $loader->registerNamespace('User', __DIR__.'/../src');

$loader->register();

return $loader;