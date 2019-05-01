<?php
declare(strict_types=1);

namespace App\Repository;


use App\Entity\AudioSession;

interface AudioSessionRepositoryInterface
{
    public function save(AudioSession $audioSession): AudioSession;

    /**
     * @return AudioSession[]
     */
    public function all(): array;

    public function one(int $id): AudioSession;
}