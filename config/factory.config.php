<?php

require_once __DIR__ . '/../app/controller/user.controller.php';
require_once __DIR__ . '/../app/controller/product.controller.php';
require_once __DIR__ . '/../app/service/user.service.php';
require_once __DIR__ . '/../app/service/product.service.php';
require_once __DIR__ . '/router.config.php';

class Factory
{
    public static function createUserController()
    {
        $userService = new UserService();
        return new UserController($userService);
    }

    public static function createProductController()
    {
        $productService = new ProductService();
        return new ProductController($productService);
    }

    public static function createRouter()
    {
        return new Router();
    }
}
