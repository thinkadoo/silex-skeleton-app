<?php

$app->mount('/user', new User\UserBundle\Controller\UserController());

$app->get('/', function () {
return "Welcome To ReSTful API";
});