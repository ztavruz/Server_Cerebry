<?php
declare(strict_types=1);

namespace App\AudioSession\Service;

use App\AudioSession\Entity\AudioSession;
use App\General\Entity\One_to_many;
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
    public function create(AudioSession $newAudioSession)
    {   
        $this->repository->create($newAudioSession);
    }

    // tested +
    //получить аудисессию зб БД по id
    public function getOne(AudioSession $thisAudioSession): AudioSession
    {   
        $thisAudioSession = $this->repository->getOne($thisAudioSession);
        return $thisAudioSession;
    }

    // tested +
    //изменить аудисессию 
    public function change(AudioSession $changeableAudioSession)
    {   
        $changeableAudioSession = $this->repository->change($changeableAudioSession);
    }

    //добавить аудио в аудиосессию
    public function addAudio(One_to_many $addedAudio)
    {   
        $addedAudio = $this->repository->addAudio($addedAudio);
    }

    // tested +
    //удалить аудио из аудиосессии
    public function removeAudio(One_to_many $removedAudio)
    {  
        $removedAudio = $this->repository->removeAudio($removedAudio);
    }


    public function getAllAudio(One_to_many $allAudio)
    {
        $allAudio = $this->repository->getAllAudio($allAudio);
        return $allAudio;
    }


}