<?php

use Engine\Container\Container;

use App\Controller\ControllerAudioSession;
use App\AudioSession\Service\ServiceAudioSession;
use App\AudioSession\Repository\RepositoryAudioSession;

use App\Controller\ControllerUser;
use App\User\Service\ServiceUser;
use App\User\Repository\RepositoryUser;

$container = new Container();


$container->set(RepositoryAudioSession::class, new RepositoryAudioSession());
$container->set(ServiceAudioSession::class, new ServiceAudioSession( $container->get(RepositoryAudioSession::class) ));
$container->set(ControllerAudioSession::class, new ControllerAudioSession( $container->get(ServiceAudioSession::class) ));


$container->set(RepositoryUser::class, new RepositoryUser());
$container->set(ServiceUser::class, new ServiceUser( $container->get(RepositoryUser::class) ));
$container->set(ControllerUser::class, new ControllerUser( $container->get(ServiceUser::class) ));




return $container;