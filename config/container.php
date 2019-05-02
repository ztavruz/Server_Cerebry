<?php

use Engine\Container\Container;

use App\AudioSessions\Controller\AudioSessionController;
use App\AudioSessions\Service\AudioSessionService;
use App\AudioSessions\Repository\AudioSessionRepository;

use App\User\Controller\UserController;
use App\User\Service\UserService;
use App\User\Repository\UserRepository;

$container = new Container();

$container->set(AudioSessionRepository::class, new AudioSessionRepository());
$container->set(AudioSessionService::class, new AudioSessionService( $container->get(AudioSessionRepository::class) ));
$container->set(AudioSessionController::class, new AudioSessionController( $container->get(AudioSessionService::class) ));

$container->set(UserRepository::class, new UserRepository());
$container->set(UserService::class, new UserService( $container->get(UserRepository::class) ));
$container->set(UserController::class, new UserController( $container->get(UserService::class) ));

$container->set(UserService::class, new UserService());
$container->set(UserController::class, new UserController( $container->get(UserService::class) ));


return $container;