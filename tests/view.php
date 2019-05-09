<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use RedBeanPHP\R as R;
use App\Controller\AudioController;
use App\Audio\Service\AudioService;
use App\Audio\Repository\AudioRepository;


use App\Controller\AudioSessionController;
use App\AudioSession\Service\AudioSessionService;
use App\AudioSession\Repository\AudioSessionRepository;

if(!R::testConnection()){
    R::setup("mysql:host=localhost;dbname=servercelebry", "root", "");
    // R::setup("mysql:host=localhost;dbname=u0301994_ServerCerebry", "ztavruz", "ztavruz123");
}

$createAudio = [
    'name'=> 'Аудио112',
    'image' => 'картинка122',
    'description' => 'Какоето описание122',
    'cost' => 'цена12321'
];
$getOneAudio =[
    'id' => '2'
];
$changeAudio = [
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


$createAudioSession = [
    //создать аудисессию+++

    // name
    // image
    // discription
    // cost
    
    'name' => 'Аудиосессия - 2',
    'image' => 'Супер картинка',
    'discription' => 'Это какое то описание аудиосессии',
    'cost' => '12200'
];
$changeAudiosession = [
    //создать аудисессию+++
    // id
    // name
    // image
    // discription
    // cost
    'id' => ' 1',
    'name' => 'Аудиосессия - 1',
    'image' => 'Супер картинка',
    'description' => 'Это какое то описание аудиосессии',
    'cost' => '12200'
];
$removeFromAbonement =[
    //audiosession_id
    //abonement_id
    'audiosession_id'=>'2',
    'abonement_id'=>'1',
];

$removeFromAbonement =[
    'audiosession_id'=>'3',
    'abonement_id'=>'1',
];

//  php -f view.php

// $test = new AudioService(new AudioRepository());
// var_dump($test->create($createAudio));
// var_dump($test->getOne($getOneAudio));
// var_dump($test->change($changeAudio));
// var_dump($test->addInAudiosession($addInAudiosession));
// var_dump($test->removeFromAudiosession($addInAudiosession));


// $test = new AudioSessionService(new AudioSessionRepository());
// var_dump($test->create($createAudioSession));
// var_dump($test->getOne($getOneAudiosession));
// var_dump($test->change($changeAudiosession));
// var_dump($test->addInAbonement($changeAudiosession));
// var_dump($test->removeFromAbonement($changeAudiosession));

