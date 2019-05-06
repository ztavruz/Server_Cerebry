<?php
declare(strict_types=1);

namespace App\Controller;


use App\Controller\Controller;
use App\AudioSession\Service\AudioSessionService;

class AudioSessionController extends Controller
{
    private $service;

    public function __construct(AudioSessionService $service)
    {
        $this->service = $service;
    }
    //создать аудисессию+++
    // id
    // name
    // image
    // discription
    // cost
    // audiosession_id
    // abonement_id
    public function createAudioSession()
    {
     
        $data_post = json_decode(file_get_contents('php://input'), true);

        $newAudio = $this->service->createInBd($data_post);

        echo $this->json($audioSession);

    }

    //получить аудисессию +++
    //id
    public function getAudioSession()
    {
        $data_post = json_decode(file_get_contents('php://input'), true);

        $newAudio = $this->service->getFromBd($data_post);

        echo $this->json($newAudio);

    }

    //изменить данные аудисессии по id +++
    // id
    // name 
    // Image
    // discription
    // cost  
    public function transformAudioSession(){
        $data_post = json_decode(file_get_contents('php://input'), true);

        $newAudio = $this->service->transformInBd($data_post);

    }

    //добавить аудисессию в абонемент +++
    // audio_id 
    // audiosession_id
    public function addIntoAbonement(){
        $data_post = json_decode(file_get_contents('php://input'), true);

        $newAudio = $this->service->addInAudiosession($data_post);
    }

    //удалить аудисессию из абонемента
    public function removeFromAbonement(){
        $data_post = json_decode(file_get_contents('php://input'), true);

        $removedAudio = $this->service->deleteInAudiosession($data_post);
    }

    //получить данные всех аудисессий 
    public function getAllAudiosession(){

    }

}