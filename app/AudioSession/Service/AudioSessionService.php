<?php
declare(strict_types=1);

namespace App\AudioSession\Service;

use App\AudioSession\DataTransfer\AudioSessionDTO;
use App\AudioSession\Entity\Audio;
use App\AudioSession\Entity\AudioSession;
use App\AudioSession\Entity\AudioSessionAudio;
use App\AudioSession\Repository\AudioRepository;
use App\General\Entity\One_to_many;
use App\AudioSession\Repository\AudioSessionRepository;

class AudioSessionService
{

    private $repository;
    /**
     * @var AudioRepository
     */
    private $audioRepository;

    public function __construct(AudioSessionRepository $repository, AudioRepository $audioRepository)
    {
        $this->repository = $repository;
        $this->audioRepository = $audioRepository;
    }

     // tested +
    //создать аудисессию
    public function create(AudioSessionDTO $dto)
    {
        $newAudioSession = new AudioSession();
        $newAudioSession->setName($dto->getName());
        $newAudioSession->setImage($dto->getImage());
        $newAudioSession->setDescription($dto->getDescription());
        $newAudioSession->setCost($dto->getCost());

        $this->repository->create($newAudioSession);
    }

    public function one(int $id): AudioSession
    {
        return $this->repository->getOne($id);
    }

    public function getAll(): array
    {
        return $this->repository->getAll();
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
    public function connect(int $audioSession_id, int $audio_id)
    {
        /** @var AudioSession $audioSession */
        $audioSession = $this->repository->getOne($audioSession_id);

        /** @var Audio $audio */
        $audio = $this->audioRepository->getOne($audio_id);

        $audioSessionAudio = new AudioSessionAudio($audioSession, $audio);

        $this->repository->saveConnect($audioSessionAudio);

        return $audioSession;
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