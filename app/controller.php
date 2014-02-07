<?php

$app->mount('/yam', new Yam\YamBundle\Controller\YamController());
$app->mount('/yoo', new Yoo\YooBundle\Controller\YooController());
$app->mount('/yum', new Yum\YumBundle\Controller\YumController());
$app->mount('/user', new User\UserBundle\Controller\UserController());

$app->get('/', function () {
    return "Welcome To ReSTful API";
});
