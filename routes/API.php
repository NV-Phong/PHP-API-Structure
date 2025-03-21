<?php
use Illuminate\Routing\Router;
use WorkSpace\Controller\AnhMoiController;

return function (Router $router) {
   $router->get('/', [AnhMoiController::class, 'getAnhMois']);
   $router->get('/anh-moi/{id}', [AnhMoiController::class, 'getAnhMoiByID']);
   $router->post('/anh-moi', [AnhMoiController::class, 'createAnhMoi']);

};