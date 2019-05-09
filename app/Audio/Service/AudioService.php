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
    public function create(Audio $newAudio)
    {   
        $this->repository->create($newAudio);
    }

    // tested +
    //получить аудио зб БД по id
    public function getOne(Audio $thisAudio): Audio
    {   
        $thisAudio = $this->repository->getOne($thisAudio);
        return $thisAudio;
    }

    // tested +
    //изменить аудио 
    public function change(Audio $changeableAudio)
    {   
        $changeableAudio = $this->repository->change($changeableAudio);
    }

}