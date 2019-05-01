<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use App\Controller\AudioSessionController;
use App\Repository\AudioSessionRepository;
use App\Repository\AudioSessionRepositoryInterface;
use App\Service\AudioSessionService;
use Engine\Container\Container;
use RedBeanPHP\R as R;

if(!R::testConnection()){
    R::setup("mysql:host=localhost;dbname=test", "root", "1234");
}


$container = new Container();

$container->set('audio.session.repository', new AudioSessionRepository());

var_dump($container);




//$url = $_SERVER['REQUEST_URI'];
//
///** @var \Engine\Router\Router $router */
//$router = require_once dirname(__DIR__) . "/routes/routes.php";
//
//$params = $router->match($url);



//$controller = new $params[0];
//$controller->{$params[1]}();
