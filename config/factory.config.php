<?php

require_once __DIR__ . '/router.config.php';

use Phong\PhpApiStructure\Service\UserService;
use Phong\PhpApiStructure\Controller\UserController;
use Phong\PhpApiStructure\Service\ProductService;
use Phong\PhpApiStructure\Controller\ProductController;
use Phong\PhpApiStructure\Service\CategoryService;
use Phong\PhpApiStructure\Controller\CategoryController;

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

    public static function createCategoryController()
    {
        $categoryService = new CategoryService();
        return new CategoryController($categoryService);
    }

    public static function createRouter()
    {
        return new Router();
    }
}
