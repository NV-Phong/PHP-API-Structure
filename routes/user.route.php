<?php

require_once __DIR__ . '/../config/factory.config.php';

$router = Factory::createRouter();
$userController = Factory::createUserController();

$router->get('/', [$userController, 'getUsers']);
$router->post('/', [$userController, 'addUser']);