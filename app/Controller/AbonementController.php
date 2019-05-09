<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\Controller;
use App\Abonement\Service\AbonementService;

class AbonementController extends Controller
{
   
    private $service;

    public function __construct(AbonementService $service)
    {
        $this->service = $service;
    }

    //создать абонемент+++
    // id
    // name
    // time_start
    // time_end
    // cost 
    // abonement_id
    // user_id

    public function createAbonement()
    {
     
        $data_post = json_decode(file_get_contents('php://input'), true);

        $newAudio = $this->service->create($data_post);

        echo $this->json($newAudio);

    }

    //получить абонемент +++
    //id
    public function getAbonement()
    {
        $data_post = json_decode(file_get_contents('php://input'), true);

        $newAudio = $this->service->getOne($data_post);

        echo $this->json($newAudio);

    }

    //изменить данные абонемента по id +++
    // name
    // time_start
    // time_end
    // cost 
    // abonement_id
    // user_id 
    public function changeAbonement(){
        $data_post = json_decode(file_get_contents('php://input'), true);

        $changeableAbonement = new Abonement();
        $changeableAbonement->setName($data_post['name']);
        $changeableAbonement->setImage($data_post['image']);
        $changeableAbonement->setDescription($data_post['description']);
        $changeableAbonement->setCost($data_post['cost']);

        $newAudio = $this->service->change($data_post);

    }

    //добавить абонемент к пользователю +++
    // audio_id 
    // user_id
    public function addInUser(){
        $data_post = json_decode(file_get_contents('php://input'), true);

        $newAudio = $this->service->addInUser($data_post);
    }

    //удалить абонемент у пользователя
    // abonement_id 
    // user_id
    public function removeFromUser(){
        $data_post = json_decode(file_get_contents('php://input'), true);

        $removedAudio = $this->service->removeFromUser($data_post);
    }

    //получить данные всех абонементов 
    public function getAllAbonement(){

    }

}