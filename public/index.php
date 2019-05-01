<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use App\Controller\AudioSessionController;
use App\Repository\AudioSessionRepository;
use App\Repository\AudioSessionRepositoryInterface;
use App\Service\AudioSessionService;
use RedBeanPHP\R as R;

if(!R::testConnection()){
    R::setup("mysql:host=localhost;dbname=test", "root", "1234");
}

//$container = new \Engine\Container\Container();
//
//$container->set(AudioSessionRepository::class, new AudioSessionRepository());
//
//$container->set(AudioSessionRepositoryInterface::class, new AudioSessionRepository());
//
//$container->set(AudioSessionService::class,
//    new AudioSessionService($container->get(AudioSessionRepositoryInterface::class))
//);
//
//$container->set(AudioSessionController::class, new AudioSessionController(
//    $container->get(AudioSessionService::class)
//));





$url = $_SERVER['REQUEST_URI'];

/** @var \Engine\Router\Router $router */
$router = require_once dirname(__DIR__) . "/routes/routes.php";

$params = $router->match($url);



$controller = new $params[0];
$controller->{$params[1]}();
