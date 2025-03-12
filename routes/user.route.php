<?php

require_once __DIR__ . '/../app/controller/user.controller.php';

$router = new Router();

$router->get('/', [new UserController(), 'getUsers']);
$router->get('/workspaces', [new UserController(), 'getWorkSpaces']);
