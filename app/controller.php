<?php

$app->get('/', function () use ($app) {
    return $app['twig']->render('welcome.twig', array());
});
