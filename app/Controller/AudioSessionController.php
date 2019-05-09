<?php
declare(strict_types=1);

namespace App\Controller;


use App\Controller\Controller;
use App\AudioSession\Entity\AudioSession;
use App\General\Entity\One_to_many;
use App\AudioSession\Service\AudioSessionService;

//создать аудисессию+++
//получить аудисессию +++
//изменить данные аудисессии по id +++
//добавить аудио в аудиосессию +++
//удалить аудио из аудиосессии +++
//получить все аудио к аудиосессии +++


class AudioSessionController extends Controller
{
    private $service;

    public function __construct(AudioSessionService $service)
    {
        $this->service = $service;
    }
    //создать аудисессию+++
    // name
    // image
    // description
    // cost
    public function createAudioSession()
    {
        $data_post = json_decode(file_get_contents('php://input'), true);

        $newAudioSession = new AudioSession();
        $newAudioSession->setName($data_post['name']);
        $newAudioSession->setImage($data_post['image']);
        $newAudioSession->setDescription($data_post['description']);
        $newAudioSession->setCost($data_post['cost']);

        $newAudioSession = $this->service->create($newAudioSession);

        echo $this->json($newComment);
    }

    //получить аудисессию +++
    //id
    public function getOneAudioSession()
    {
        $data_post = json_decode(file_get_contents('php://input'), true);

        $thisAudioSession = new Audio();
        $thisAudioSession->setId($data_post['id']);
        $thisAudioSession = $this->service->getOne($thisAudioSession);

        echo $this->json($thisAudioSession);

    }

    //изменить данные аудисессии по id +++
    // id
    // name 
    // Image
    // description
    // cost  
    public function changeAudioSession()
    {
        $data_post = json_decode(file_get_contents('php://input'), true);

        $changeableAudioSession = new AudioSession();
        $changeableAudioSession->setId($data_post['id']);
        $changeableAudioSession->setName($data_post['name']);
        $changeableAudioSession->setImage($data_post['image']);
        $changeableAudioSession->setDescription($data_post['description']);
        $changeableAudioSession->setCost($data_post['cost']);

        $changeableAudioSession = $this->service->change($changeableAudioSession);

    }

    //добавить аудио в аудиосессию +++
    // audio_id 
    // audiosession_id
    public function addAudio(){
        $data_post = json_decode(file_get_contents('php://input'), true);

        $addedAudio = new One_to_many();
        $addedAudio->setOne($data_post['audiosession_id']);
        $addedAudio->setMany($data_post['audio_id']);

        $addedAudio = $this->service->addAudio($addedAudio);
    }

    //удалить аудио из аудиосессии
    public function removeAudio(){
        $data_post = json_decode(file_get_contents('php://input'), true);

        $removedAudio = new One_to_many();
        $removedAudio->setOne($data_post['audiosession_id']);
        $removedAudio->setMany($data_post['audio_id']);

        $removedAudio = $this->service->removeAudio($removedAudio);
    }

    //получить все аудио к аудиосессии 
    public function getAllAudio(){
        $data_post = json_decode(file_get_contents('php://input'), true);

        $allAudio = new One_to_many();
        $allAudio->setOne($data_post['audiosession_id']);

        $allAudio =$this->service->getAllAudio($allAudio);

        return $allAudio;
    }

}