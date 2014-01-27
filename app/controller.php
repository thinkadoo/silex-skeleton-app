<?php

$app->mount('/todo', new Todo\TodoBundle\Controller\TodoController());
$app->mount('/user', new User\UserBundle\Controller\UserController());

$app->get('/', function () {
    return "Welcome To ReSTful API";
});
