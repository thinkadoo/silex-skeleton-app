<?php

$app->mount('/party', new Party\PartyBundle\Controller\PartyController());
$app->mount('/partyrelationship', new PartyRelationship\PartyRelationshipBundle\Controller\PartyRelationshipController());
$app->mount('/partyrole', new PartyRole\PartyRoleBundle\Controller\PartyRoleController());

$app->get('/', function () use ($app) {
    return $app['twig']->render('welcome.twig', array());
});