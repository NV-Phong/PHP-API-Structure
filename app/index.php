<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/router.php';
require __DIR__ . '/../routes/user.route.php';
require __DIR__ . '/../config/env.config.php';

$router->dispatch();