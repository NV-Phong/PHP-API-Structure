<?php
use Illuminate\Routing\Router;
use Phong\Controller\CategoryController;

return function (Router $router) {
   $router->get('/categories', [CategoryController::class, 'index']);
   $router->get('/category/{id}', [CategoryController::class, 'show']);
};