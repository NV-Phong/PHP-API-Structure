<?php
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\JsonResponse;

function RouterConfig($container)
{
    // Truyền container vào Router
    $router = new Router(new \Illuminate\Events\Dispatcher(), $container);

    $routes = require __DIR__ . '/../routes/View.php';
    $routes($router);

    $request = Request::createFromGlobals();

    try {
        $response = $router->dispatch($request);
    } catch (NotFoundHttpException $e) {
        $response = new JsonResponse([
            'message' => 'Route not found',
            'status' => 404
        ], 404);
    }

    $response->send();
}