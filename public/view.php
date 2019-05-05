<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use RedBeanPHP\R as R;
use App\Audio\Service\AudioService;
use App\Audio\Repository\AudioRepository;

if(!R::testConnection()){
    R::setup("mysql:host=localhost;dbname=servercelebry", "root", "");
    // R::setup("mysql:host=localhost;dbname=u0301994_ServerCerebry", "ztavruz", "ztavruz123");
}

$newAudio = [
    'name'=> 'Аудио1',
    'image' => 'картинка',
    'description' => 'Какоето описание',
    'cost' => 'цена'
];
$getFromBd =[
    'id' => '2'
];
$changeToBd = [
    'id' => '3',
    'name'=> 'АудиоChanged3',
    'image' => 'картинкаChanged3',
    'description' => 'Какоето описаниеChanged3',
    'cost' => 'ценаChanged3'
];
$addInAudiosession = [
    'audio_id' => '7',
    'audiosession_id' => '1'
];
$removeFromAudiosession = [
    'audio_id' => '0',
    'audiosession_id' => '0'
];


// > php -f view.php
$test = new AudioService(new AudioRepository());
// var_dump($test->createInBd($newAudio));
// var_dump($test->getFromBd($getFromBd));
// var_dump($test->changeToBd($changeToBd));
// var_dump($test->addInAudiosession($addInAudiosession));
var_dump($test->removeFromAudiosession($removeFromAudiosession));

