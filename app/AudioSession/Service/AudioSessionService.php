<?php
declare(strict_types=1);

namespace App\AudioSession\Service;

use App\AudioSession\Entity\AudioSession;
use App\AudioSession\Repository\AudioSessionRepository;

class AudioSessionService
{

    private $repository;

    public function __construct(AudioSessionRepository $repository)
    {
        $this->repository = $repository;
    }

     // tested +
    //создать аудисессию
    public function create(array $data_post)
    {   //id
        //name
        //image
        //discription
        //cost
        //audiosession_id
        //abonement_id
    
        $newAudioSession = new AudioSession();
        $newAudioSession->setName($data_post['name']);
        $newAudioSession->setImage($data_post['image']);
        $newAudioSession->setDescription($data_post['description']);
        $newAudioSession->setCost($data_post['cost']);

        $this->repository->create($newAudioSession);
    }

    // tested +
    //получить аудисессию зб БД по id
    public function getOne(array $data_post): Audio
    {   // id
        $thisAudioSession = new Audio();
        $thisAudioSession->setId($data_post['id']);

        $thisAudioSession = $this->repository->getOne($thisAudioSession);
        return $thisAudioSession;
    }

    // tested +
    //изменить аудисессию 
    public function change(array $data_post)
    {   // id
        // name 
        // image
        // discription
        // cost  
        $changeableAudioSession = new AudioSession();
        $changeableAudioSession->setId($data_post['id']);
        $changeableAudioSession->setName($data_post['name']);
        $changeableAudioSession->setImage($data_post['image']);
        $changeableAudioSession->setDescription($data_post['description']);
        $changeableAudioSession->setCost($data_post['cost']);

        $changeableAudioSession = $this->repository->change($changeableAudioSession);
        
    }

    // tested +
    //добавить аудисессию в абонемент
    public function addInAbonement(array $data_post)
    {   //audiosession_id
        //abonement_id
        $audioForAbonement = new AudioSession();
        $audioForAbonement->setAudiosession_id($data_post['audiosession_id']);
        $audioForAbonement->setAbonement_id($data_post['abonement_id']);
        $audioForAbonement = $this->repository->addInAbonement($audioForAbonement);

       
    }

    // tested +
    //удалить аудисессию из абонемента
    public function removeFromAbonement(array $data_post)
    {   // audiosession_id 
        // abonement_id
        $removedAbonement = new Audio();
        $removedAbonement->setAudiosession_id($data_post['audio_id']);
        $removedAbonement->setAbonement_id($data_post['audiosession_id']);
        $removedAbonement = $this->repository->removeFromAbonement($removedAbonement);

    }


}