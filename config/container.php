<?php

use App\AudioSession\Repository\AudioRepository;
use Engine\Container\Container;

use App\Controller\AudioSessionController;
use App\AudioSession\Service\AudioSessionService;
use App\AudioSession\Repository\AudioSessionRepository;

use App\Controller\UserController;
use App\User\Service\UserService;
use App\User\Repository\UserRepository;

$container = new Container();


$container->set(AudioRepository::class, new AudioRepository());

$container->set(AudioSessionRepository::class, new AudioSessionRepository());
$container->set(AudioSessionService::class, new AudioSessionService( $container->get(AudioSessionRepository::class), $container->get(AudioRepository::class) ));
$container->set(AudioSessionController::class, new AudioSessionController( $container->get(AudioSessionService::class) ));


$container->set(UserRepository::class, new UserRepository());
$container->set(UserService::class, new UserService( $container->get(UserRepository::class) ));
$container->set(UserController::class, new UserController( $container->get(UserService::class) ));




return $container;