<?php
use Illuminate\Routing\Router;
use Phong\PhpApiStructure\Controller\AnhMoiController;

return function (Router $router) {
   $router->get('/', [AnhMoiController::class, 'getAnhMois']);
   $router->get('/anh-moi/{id}', [AnhMoiController::class, 'getAnhMoiByID']);

};