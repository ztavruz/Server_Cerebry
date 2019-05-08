<?php
declare(strict_types=1);

namespace App\Audio\Service;

use App\Audio\Entity\Audio;
use App\Audio\Repository\AudioRepository;

class AudioService
{

    private $repository;

    public function __construct(AudioRepository $repository)
    {
        $this->repository = $repository;
    }


    // tested +
    //создать аудио
    public function create(array $data_post): Audio
    {   // id
        // name 
        // image
        // discription
        // cost
        $newAudio = new Audio();
        $newAudio->setName($data_post['name']);
        $newAudio->setImage($data_post['image']);
        $newAudio->setDescription($data_post['description']);
        $newAudio->setCost($data_post['cost']);

        $this->repository->create($newAudio);

        return $newAudio;
    }

    // tested +
    //получить аудио зб БД по id
    public function getOne(array $data_post): Audio
    {   // id
        $thisAudio = new Audio();
        $thisAudio->setId($data_post['id']);

        $thisAudio = $this->repository->getOne($thisAudio);
        return $thisAudio;
    }

    // tested +
    //изменить аудио 
    public function change(array $data_post)
    {   // id
        // name 
        // image
        // discription
        // cost  
        $changeableAudio = new Audio();
        $changeableAudio->setId($data_post['id']);
        $changeableAudio->setName($data_post['name']);
        $changeableAudio->setImage($data_post['image']);
        $changeableAudio->setDescription($data_post['description']);
        $changeableAudio->setCost($data_post['cost']);

        $changeableAudio = $this->repository->change($changeableAudio);
        
    }

    // tested +
    //добавить аудио в аудиосессию
    public function addInAudiosession(array $data_post)
    {   // audio_id 
        // audiosession_id
        $audioForAudiosession = new Audio();
        $audioForAudiosession->setAudio_id($data_post['audio_id']);
        $audioForAudiosession->setAudiosession_id($data_post['audiosession_id']);
        $audioForAudiosession = $this->repository->addInAudiosession($audioForAudiosession);

       
    }

    // tested +
    //удалить аудио из аудиосессии
    public function removeFromAudiosession(array $data_post)
    {   // audio_id 
        // audiosession_id
        $removedAudio = new Audio();
        $removedAudio->setAudio_id($data_post['audio_id']);
        $removedAudio->setAudiosession_id($data_post['audiosession_id']);
        $removedAudio = $this->repository->removeFromAudiosession($removedAudio);

    }
}