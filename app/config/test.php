<?php

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => array(
        __DIR__.'/../../views',
        __DIR__.'/../../src/User/UserBundle/View',
    )
));

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
        'db.options' => array(
        'driver'   => 'pdo_mysql',
        'dbname'   => 'resttestdb',
        'host'     => 'localhost',
        'port'     => 80,
        'user'     => 'root',
        'password' => ''
    ),
));
