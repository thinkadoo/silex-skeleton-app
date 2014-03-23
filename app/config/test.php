<?php

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => array(
        __DIR__.'/../../views',
    )
));

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'dbname'   => 'resttestdb',
        'host'     => 'localhost',
        'user'     => 'root',
        'password' => '',
        'port'     => 80,
    ),
));
