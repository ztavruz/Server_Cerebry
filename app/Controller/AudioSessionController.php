<?php
declare(strict_types=1);

namespace App\Controller;


use App\AudioSession\DataTransfer\AudioSessionDTO;
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

        $audioSessionDTO = new AudioSessionDTO();
        $audioSessionDTO->setName($data_post['name']);
        $audioSessionDTO->setCost($data_post['cost']);
        $audioSessionDTO->setImage($data_post['image']);
        $audioSessionDTO->setDescription($data_post['description']);


        $this->service->create($audioSessionDTO);

    }

    //получить аудисессию +++
    //id
    public function getOneAudioSession()
    {
        $id = (int)$_GET['id'];

        $audioSession = $this->service->one($id);

        echo $this->json($audioSession);

    }

    public function getAll()
    {
        $audioSessions = $this->service->getAll();

        echo $this->json($audioSessions);
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

    public function connect()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        /**{
            "audiosession_id" : 1,
            "audio_id": "2"
            }
         */

        $connect = $this->service->connect($data['audiosession_id'], $data['audio_id']);

        echo $this->json($connect);
    }

}