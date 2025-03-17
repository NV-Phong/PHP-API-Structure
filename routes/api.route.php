<?php

require_once __DIR__ . '/../config/factory.config.php';

$router = Factory::createRouter();
$userController = Factory::createUserController();
$productController = Factory::createProductController();
$categoryController = Factory::createCategoryController();

$router->get('/', [$userController, 'getUsers']);
$router->post('/', [$userController, 'addUser']);

$router->get('/products', [$productController, 'getProducts']);
$router->post('/products', [$productController, 'addProduct']);
$router->get('/view/products', [$productController, 'displayProducts']);

$router->get('/categories', [$categoryController, 'getCategories']);
$router->post('/categories', [$categoryController, 'addCategory']);
$router->get('/view/categories', [$categoryController, 'displayCategories']);