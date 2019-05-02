<?php
declare(strict_types=1);

namespace App\Audiosessions\Service;

use App\Audiosessions\Entity\AudioSession;
use App\Audiosessions\Repository\AudioSessionRepository;

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

    public function create(string $name, string $description, string $image, int $price): AudioSession
    {
        $audio = new AudioSession($name, $description, $image, $price);

        $this->repository->save($audio);

        return $audio;
    }


}