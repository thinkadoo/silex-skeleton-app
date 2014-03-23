<?php

$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../../logs/production.log',
));

$app['monolog']->addDebug('Testing the Monolog logging from /config/prod.php ');

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => array(
        __DIR__.'/../../views',
    )
));

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'dbname'   => 'restdb',
        'host'     => 'localhost',
        'user'     => 'root',
        'password' => '',
        'port'     => 80,
    ),
));

$app->register(new Renderer\RendererServiceProvider(), array(

));
