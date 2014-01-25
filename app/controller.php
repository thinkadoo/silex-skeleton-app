<?php

$app->mount('/todo', new Todo\TodoBundle\Controller\TodoController());

$app->get('/', function () {
    return "Welcome To ReSTful API";
});
