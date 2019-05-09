<?php
declare(strict_types=1);

namespace App\AudioSession\Repository;


use App\AudioSession\Entity\Audio;
use RedBeanPHP\R as R;

class AudioRepository
{
    public function getOne(int $id): Audio
    {
        $data = R::getRow("SELECT * FROM audios WHERE id = ?", [$id]);

        $audio = new Audio($data['name'], (int)$data['cost']);
        $audio->setId($data['id']);

        return $audio;
    }

}