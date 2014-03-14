<?php

$app->mount('/user', new User\UserBundle\Controller\UserController());

$app->get('/', function () use ($app) {
    return $app['twig']->render('welcome.twig', array());
});
