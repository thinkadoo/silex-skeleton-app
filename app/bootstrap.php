<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();

    $loader->registerNamespace('Renderer', __DIR__.'/../lib');

$loader->register();

return $loader;