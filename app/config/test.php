<?php

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => array(
        __DIR__.'/../../views',
        __DIR__.'/../../src/Party/PartyBundle/View',
        __DIR__.'/../../src/PartyRelationship/PartyRelationshipBundle/View',
        __DIR__.'/../../src/PartyRole/PartyRoleBundle/View',
    )
));

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'dbname'   => 'resttestdb',
        'host'     => '127.0.0.1',
        'user'     => 'root',
        'password' => 'root',
        'port'     => 3306,
    ),
));
