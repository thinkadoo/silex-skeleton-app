<?php

$app['debug'] = true;

$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../../logs/development.log',
));

$app['monolog']->addDebug('Testing the Monolog logging from /config/dev.php ');

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'dbname'   => 'restdb',
        'host'     => 'localhost',
        'user'     => 'root',
        'password' => 'root'
    ),
));
