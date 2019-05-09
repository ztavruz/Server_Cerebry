<?php
declare(strict_types=1);

namespace App\Audio\Repository;

use RedBeanPHP\R;
use App\Audio\Entity\Audio;
use App\General\Entity\Helper;

class AudioRepository
{   
    //создать аудио
    public function create(Audio $newAudio)
    {
        $bean = R::dispense("audio");
        $bean->name = $newAudio->getName();
        $bean->image = $newAudio->getImage();
        $bean->description = $newAudio->getDescription();
        $bean->cost = $newAudio->getCost();
        R::store($bean);
    }

    //получить аудио зб БД по id
    public function getOne(Audio $thisAudio)
    {
        $thisAudio = $thisAudio->getId();
        $thisAudio = R::getRow("SELECT * FROM audio WHERE id = ?", [$thisAudio]);

        $helper = new Helper();
        $thisAudio = $helper->convertToObjectAudio($thisAudio);
        return $thisAudio;
    }

    //изменить аудио 
    public function change(Audio $changeableAudio)
    {   
        $changeableAudio = $changeableAudio->getId();

        $bean = R::load('audio', $changeableAudio_id);
        $bean->name = $changeableAudio->getName();
        $bean->image= $changeableAudio->getImage();
        $bean->description = $changeableAudio->getDescription();
        $bean->cost = $changeableAudio->getCost();
        R::store($bean);
    }
}