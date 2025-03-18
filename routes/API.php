<?php
use Illuminate\Routing\Router;
use Phong\PhpApiStructure\Controller\UserController;
use Phong\PhpApiStructure\Controller\ProductController;
use Phong\PhpApiStructure\Controller\CategoryController;

return function (Router $router) {
   $router->get('/', [UserController::class, 'getUsers']);
   $router->get('/users', [UserController::class, 'getUsers']);
   $router->post('/users', [UserController::class, 'addUser']);

   $router->get('/products', [ProductController::class, 'getProducts']);

   $router->get('/categories', [CategoryController::class, 'getCategories']);
};