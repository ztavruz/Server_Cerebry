<?php


require_once dirname(__DIR__) . "/vendor/autoload.php";

use Engine\Container\Container;
use RedBeanPHP\R as R;

exit("test");

if(!R::testConnection()){
    R::setup("mysql:host=localhost;dbname=test", "root", "1234");
    // R::setup("mysql:host=localhost;dbname=u0301994_ServerCerebry", "ztavruz", "ztavruz123");
}





$url = $_SERVER['REQUEST_URI'];

// return include_once(__DIR__.'./PreloaderCSS3/index.html');

/** @var Container $container */
$container = require_once dirname(__DIR__) . "/config/container.php";


/** @var \Engine\Router\Router $router */
$router = require_once dirname(__DIR__) . "/config/routes.php";



$params = $router->match($url);


$controller = $container->get($params[0]);
$controller->{$params[1]}();
