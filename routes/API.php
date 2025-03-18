<?php
use Illuminate\Routing\Router;
use Phong\PhpApiStructure\Controller\UserController;

return function (Router $router) {
   $router->get('/', [UserController::class, 'getUsers']);
   $router->get('/users', [UserController::class, 'getUsers']);
   $router->post('/users', [UserController::class, 'addUser']);

};