<?php
declare(strict_types=1);

namespace App\Service;


use App\Entity\AudioSession;
use App\Repository\AudioSessionRepositoryInterface;

class AudioSessionService
{

    private $repository;

    public function __construct(AudioSessionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function list(): array
    {
        return $this->repository->all();
    }

    public function create(string $name, string $description, string $image, int $price): AudioSession
    {
        $audio = new AudioSession($name, $description, $image, $price);

        $this->repository->save($audio);

        return $audio;
    }


}