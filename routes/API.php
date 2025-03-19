<?php
use Illuminate\Routing\Router;
use Phong\PhpApiStructure\Controller\UserController;
use Phong\PhpApiStructure\Controller\AnhMoiController;

return function (Router $router) {
   $router->get('/', [AnhMoiController::class, 'getAnhMois']);
   
   $router->get('/users', [UserController::class, 'getUsers']);
   $router->post('/users', [UserController::class, 'addUser']);


};