<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.config.php';
require_once __DIR__ . '/../config/router.config.php';

// Khởi tạo Container
$container = new \Illuminate\Container\Container();

// Tạo instance PDO
$DB = new Database()->connect();

// Bind PDO vào container
$container->instance('PDO', $DB);

// Gọi RouterConfig với container
RouterConfig($container);