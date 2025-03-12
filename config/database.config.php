<?php

use Illuminate\Database\Capsule\Manager as Capsule;

require_once __DIR__ . '/env.config.php';

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $ENVCONFIG['DB']['HOST'],
    'port'      => $ENVCONFIG['DB']['PORT'],
    'database'  => $ENVCONFIG['DB']['NAME'],
    'username'  => $ENVCONFIG['DB']['USERNAME'],
    'password'  => $ENVCONFIG['DB']['PASSWORD'],
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();