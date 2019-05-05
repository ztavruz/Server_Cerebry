<?php
declare(strict_types=1);

namespace App\AudioSession\Service;

use App\AudioSession\Entity\AudioSessionDTO;
use App\AudioSession\Repository\AudioSessionRepository;

class AudioSessionService
{

    private $repository;

    public function __construct(AudioSessionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list(): array
    {
        return $this->repository->getAll();
    }

    public function createAudiosession(array $content): AudioSessionDTO
    {
        $audioSession = new AudioSessionDTO();
        $audioSession->name = $content['name'];
        $audioSession->image = $content['image'];
        $audioSession->discription = $content['discription'];
        $audioSession->price = $content['price'];

        $this->repository->saveAudiosession($audioSession);

        return $audioSession;
    }

    public function getAudiosession(array $content): AudioSessionDTO
    {
        $audioSession_id = new AudioSessionDTO();
        $audioSession_id->id = $content['id'];

        $audioSession_id = $this->repository->getAudiosessionBD($audioSession_id);
        
        return $audioSession_id;
    }


}