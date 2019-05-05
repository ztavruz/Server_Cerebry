<?php


use App\Controller\ControllerAudioSession;
use App\Controller\ControllerUser;
use App\Controller\ControllerView;
use Engine\Router\Router;

$router = new Router();


$router->register("/audio/create", AudioSessionController::class, "createAudiosession");
$router->register('/audio/list', AudioSessionController::class, 'listAll');

$router->register('/users/signup', UserController::class, 'signup');
$router->register('/users/registration', UserController::class, 'registrationNewUser');
$router->register('/users/autorization', UserController::class, 'autorizationUser');





return $router;