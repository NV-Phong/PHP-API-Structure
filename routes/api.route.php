<?php

require_once __DIR__ . '/../config/factory.config.php';

$router = Factory::createRouter();
$userController = Factory::createUserController();
$productController = Factory::createProductController();

$router->get('/', [$userController, 'getUsers']);
$router->post('/', [$userController, 'addUser']);

$router->get('/products', [$productController, 'getProducts']);
$router->post('/products', [$productController, 'addProduct']);