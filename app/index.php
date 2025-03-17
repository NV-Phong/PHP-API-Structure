<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.config.php';
require_once __DIR__ . '/../routes/api.route.php';

$router->dispatch();