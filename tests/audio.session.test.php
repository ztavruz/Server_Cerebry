<?php

use App\AudioSession\Entity\Audio;
use \RedBeanPHP\R as R;

require_once dirname(__DIR__) . "/vendor/autoload.php";


if(!R::testConnection()){
    R::setup("mysql:host=localhost;dbname=test", "root", "1234");
    // R::setup("mysql:host=localhost;dbname=u0301994_ServerCerebry", "ztavruz", "ztavruz123");
}

/** @var \Engine\Container\Container $container */
$container = require_once dirname(__DIR__) . "/config/container.php";

/** @var \App\AudioSession\Service\AudioSessionService $audioSessionService */
$audioSessionService = $container->get(\App\AudioSession\Service\AudioSessionService::class);



//$audioSession = $audioSessionService->connect(1, 2);
//$audioSession = $audioSessionService->connect(1, 3);
//$audioSession = $audioSessionService->connect(1, 5);

$audioSession = $audioSessionService->one(1);

var_dump($audioSession->getAudios());
//
//$dto = new \App\AudioSession\DataTransfer\AudioSessionDTO();
//
//$result = $service->create($dto);