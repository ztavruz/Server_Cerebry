<?php


use App\Controller\ControllerAudioSession;
use App\Controller\ControllerUser;
use Engine\Router\Router;

$router = new Router();

$router->register("/audio/create", ControllerAudioSession::class, "createAudiosession");
$router->register('/audio/list', ControllerAudioSession::class, 'listAll');

$router->register('/users/signup', ControllerUser::class, 'signup');
$router->register('/users/registration', ControllerUser::class, 'registrationNewUser');
$router->register('/users/autorization', ControllerUser::class, 'autorizationUser');
$router->register('/', ControllerUser::class, 'hello');



return $router;