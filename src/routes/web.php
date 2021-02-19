<?php

/** @var \Laravel\Lumen\Routing\Router $router */

require __DIR__.'/../modules/APIClient/Http/routes/index.php';

$router->get('/', function () use ($router) {
    return $router->app->version();
});

