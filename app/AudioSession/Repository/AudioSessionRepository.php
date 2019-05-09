<?php
declare(strict_types=1);

namespace App\AudioSession\Repository;

use RedBeanPHP\R;
use App\AudioSession\Entity\AudioSession;
use App\General\Entity\One_to_many;
use App\General\Entity\Helper;


class AudioSessionRepository
{   
    //создать аудисессию
    public function create(AudioSession $newAudioSession)
    {
        $bean = R::dispense("audiosession");
        $bean->name = $newAudioSession->getName();
        $bean->image = $newAudioSession->getImage();
        $bean->description = $newAudioSession->getDescription();
        $bean->cost = $newAudioSession->getCost();
        R::store($bean);
    }

    //получить аудисессию из БД по id
    public function getOne(AudioSession $thisAudioSession)
    {
        $thisAudioSession_id = $thisAudioSession->getId();
        $helper = new Helper();

        $thisAudioSession = R::getRow("SELECT * FROM audiosession WHERE id = ?", [$thisAudioSession_id]);
        return $helper->convertToObjectAudioSession($thisAudioSession);
        
    }

    //изменить аудисессию 
    public function change(AudioSession $changeableAudioSession)
    {   // id
        // name 
        // Image
        // discription
        // cost  
        $changeableAudioSession_id = $changeableAudioSession->getId();

        $bean = R::load('audiosession', $changeableAudioSession_id);
        $bean->name = $changeableAudioSession->getName();
        $bean->image= $changeableAudioSession->getImage();
        $bean->description = $changeableAudioSession->getDescription();
        $bean->cost = $changeableAudioSession->getCost();
        R::store($bean);
    }

    public function addAudio(One_to_many $addedAudio){

        $addedAudio = new One_to_many();
        $bean = R::dispense("audio_for_audiosession");
        $bean->audiosession_id = $addedAudio->getOne();
        $bean->audio_id = $addedAudio->getMany();
        R::store($bean);

    }

    public function removeAudio(One_to_many $removedAudio){
        $removedAudio = $removedAudio->getMany();
        $audiosession_id = $removedAudio->geAOne();
        $findAudiosession = R::getRow('SELECT * FROM audio_for_audiosession WHERE audiosession_id=? 
                                AND abonement_id=?', [$removedAudio, $audiosession_id]);
        $removedAudio = $findAudiosession['id'];

        $bean = R::load('audio_for_audiosession', $removedAudio);
        R::trash($bean); 
    }

    public function getAllAudio(One_to_many $allAudio){

        $allAudio = $allAudio->getOne();
        $allAudio = R::getRow('SELECT * FROM audio_for_audiosession 
                                                WHERE audiosession_id=?',[$allAudio]);
        $listAudio = [];
        $helper = new Helper();

        foreach($allAudio as $audio){
            $listAudio[] = $helper->convertToObjectOne_to_many($audio);
        }
        return $listAudio;
    }

}