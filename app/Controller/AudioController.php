<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\Controller;
use App\Audio\Service\AudioService;

class AudioController extends Controller
{
    
    private $service;

    public function __construct(AudioService $service)
    {
        $this->service = $service;
    }

    //создать аудио+++
    // id
    // name 
    // Image
    // discription
    // cost  
    public function createAudio()
    {
     
        $data_post = json_decode(file_get_contents('php://input'), true);

        $newAudio = $this->service->create($data_post);

        echo $this->json($newAudio);

    }

    //получить аудио +++
    //id
    public function getAudio()
    {
        $data_post = json_decode(file_get_contents('php://input'), true);

        $newAudio = $this->service->getOne($data_post);

        echo $this->json($newAudio);

    }

    //изменить данные аудио по id +++
    // id
    // name 
    // Image
    // discription
    // cost  
    public function changeAudio(){
        $data_post = json_decode(file_get_contents('php://input'), true);

        $newAudio = $this->service->change($data_post);

    }

    //добавить аудио в аудиосессию +++
    // audio_id 
    // audiosession_id
    public function addInAudiosession(){
        $data_post = json_decode(file_get_contents('php://input'), true);

        $newAudio = $this->service->addInAudiosession($data_post);
    }

    //удалить аудио из аудиосессии
    public function removeFromAudiosession(){
        $data_post = json_decode(file_get_contents('php://input'), true);

        $removedAudio = $this->service->removeFromAudiosession($data_post);
    }

    //получить данные всех аудио 
    public function getAllAudio(){

    }

}