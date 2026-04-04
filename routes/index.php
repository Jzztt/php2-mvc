<?php

use App\controllers\ProductController;

require_once __DIR__ . '/../app/helpers.php';

$router = new \Bramus\Router\Router();

$router->get('/', function () {
    echo "Hello world";
});


$router->mount('/products', function () use ($router) {
    $router->get('/', ProductController::class . "@index");
    $router->get('/create', ProductController::class . "@create");
    $router->post('/store', ProductController::class . "@store");
    $router->get('/{id}/edit', ProductController::class . "@edit");
    $router->post('/{id}/update', ProductController::class . "@update");
    $router->get('/{id}/delete', ProductController::class . "@delete");
});




$router->run();
