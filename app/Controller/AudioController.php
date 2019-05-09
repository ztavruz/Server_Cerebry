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
    // name 
    // Image
    // discription
    // cost  
    public function createAudio()
    {
     
        $data_post = json_decode(file_get_contents('php://input'), true);

        $newAudio = new Audio();
        $newAudio->setName($data_post['name']);
        $newAudio->setImage($data_post['image']);
        $newAudio->setDescription($data_post['description']);
        $newAudio->setCost($data_post['cost']);

        $newAudio = $this->service->create($newAudio);

        echo $this->json($newAudio);

    }

    //получить аудио +++
    //id
    public function geOnetAudio()
    {
        $data_post = json_decode(file_get_contents('php://input'), true);

        $thisAudio = new Audio();
        $thisAudio->setId($data_post['id']);
        $thisAudio = $this->repository->getOne($thisAudio);

        echo $this->json($newAudio);
    }

    //изменить данные аудио по id +++
    // name 
    // Image
    // discription
    // cost  
    public function changeAudio(){
        $data_post = json_decode(file_get_contents('php://input'), true);

        $changeableAudio = new Audio();
        $changeableAudio->setName($data_post['name']);
        $changeableAudio->setImage($data_post['image']);
        $changeableAudio->setDescription($data_post['description']);
        $changeableAudio->setCost($data_post['cost']);

        $changeableAudio = $this->service->change($changeableAudio);
    }

    //получить данные всех аудио 
    public function getAllAudio(){

    }

}