<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();

$loader->registerNamespace('Yum', __DIR__.'/../src');
$loader->registerNamespace('Yoo', __DIR__.'/../src');
$loader->registerNamespace('Yam', __DIR__.'/../src');

$loader->register();

return $loader;
