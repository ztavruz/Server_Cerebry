<?php


use App\Controller\AudioSessionController;
use App\Controller\UsersController;
use App\Repository\AudioSessionRepository;
use App\Service\AudioSessionService;
use App\Service\UsersService;
use Engine\Container\Container;

$container = new Container();

$container->set(AudioSessionRepository::class, new AudioSessionRepository());
$container->set(AudioSessionService::class, new AudioSessionService( $container->get(AudioSessionRepository::class) ));
$container->set(AudioSessionController::class, new AudioSessionController( $container->get(AudioSessionService::class) ));


$container->set(UsersService::class, new UsersService());
$container->set(UsersController::class, new UsersController( $container->get(UsersService::class) ));


return $container;