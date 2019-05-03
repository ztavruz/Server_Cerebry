<?php
declare(strict_types=1);

namespace App\AudioSession\Service;

use App\AudioSession\Entity\AudioSession;
use App\AudioSession\Repository\RepositoryAudioSession;

class ServiceAudioSession
{

    private $repository;

    public function __construct(RepositoryAudioSession $repository)
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