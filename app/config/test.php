<?php

$app['debug'] = true;
$app['exception_handler']->disable();

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'dbname'   => 'resttestdb',
        'host'     => 'localhost',
        'user'     => 'root',
        'password' => 'root'
    ),
));
