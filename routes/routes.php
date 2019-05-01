<?php


use App\Controller\AudioSessionController;
use App\Controller\UsersController;
use Engine\Router\Router;

$router = new Router();

$router->register("/audio/create", AudioSessionController::class, "create");
$router->register('/audio/list', AudioSessionController::class, 'list');

$router->register('/users/signup', UsersController::class, 'signup');


return $router;