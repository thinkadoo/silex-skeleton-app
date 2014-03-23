<?php

$app['debug'] = true;

$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../../logs/development.log',
));

$app['monolog']->addDebug('Testing the Monolog logging from /config/dev.php ');

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => array(
        __DIR__.'/../../views',
        __DIR__.'/../../src/User/UserBundle/View',
    )
));

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
        'db.options' => array(
        'driver'   => 'pdo_mysql',
        'dbname'   => 'restdb',
        'host'     => 'localhost',
        'port'     => 80,
        'user'     => 'root',
        'password' => ''
    ),
));

$app->register(new Renderer\RendererServiceProvider(), array(

));
