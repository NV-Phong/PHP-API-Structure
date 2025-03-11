<?php
require __DIR__ . '/../vendor/autoload.php';

$ENVIRONMENT = getenv('APP_ENV') ?: 'development'; //TODO: Change to production
$DOTENV = Dotenv\Dotenv::createImmutable(__DIR__ . '/../', ".env.{$ENVIRONMENT}");
$DOTENV->safeLoad();

$ENVCONFIG = [
   'APP' => [
      'HOST' => $_ENV['APP_HOST'],
      'PORT' => $_ENV['APP_PORT'],
   ],
   'DB' => [
      'HOST' => $_ENV['DB_HOST'],
      'PORT' => $_ENV['DB_PORT'],
      'NAME' => $_ENV['DB_NAME'],
      'USERNAME' => $_ENV['DB_USERNAME'],
      'PASSWORD' => $_ENV['DB_PASSWORD'],
   ],
];

return $ENVCONFIG;