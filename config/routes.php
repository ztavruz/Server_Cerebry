<?php


use App\Controller\AudioSessionController;
use Engine\Router\Router;

$router = new Router();


$router->register("/api/audiosession/connect", AudioSessionController::class, "connect");

return $router;