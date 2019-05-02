<?php


use App\Controller\AudioSessionController;
use App\Controller\UsersController;
use Engine\Router\Router;

$router = new Router();

$router->register("/audio/create", AudioSessionController::class, "createAudiosession");
$router->register('/audio/list', AudioSessionController::class, 'listAll');

$router->register('/users/signup', UsersController::class, 'signup');


return $router;