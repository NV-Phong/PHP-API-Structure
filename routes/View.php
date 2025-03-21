<?php
use Illuminate\Routing\Router;
use Phong\Controller\View\CategoryController;

return function (Router $router) {
   $router->get('/', [CategoryController::class, 'index']);
};