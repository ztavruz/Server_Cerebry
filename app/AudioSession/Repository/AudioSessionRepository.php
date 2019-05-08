<?php
declare(strict_types=1);

namespace App\AudioSession\Repository;

use RedBeanPHP\R;
use App\AudioSession\Entity\AudioSession;


class AudioSessionRepository
{   
    //создать аудисессию
    public function createAudioSession(AudioSession $newAudioSession)
    {
        $bean = R::dispense("audiosession");
        $bean->name = $newAudioSession->getName();
        $bean->image = $newAudioSession->getImage();
        $bean->description = $newAudioSession->getDescription();
        $bean->cost = $newAudioSession->getCost();
        R::store($bean);
    }

    //получить аудисессию зб БД по id
    public function getOne(AudioSession $thisAudioSession)
    {
        $thisAudioSession_id = $thisAudioSession->getId();
        $thisAudioSession = R::getRow("SELECT * FROM audios WHERE id = ?", [$thisAudioSession_id]);
        return $this->convertToObject($thisAudioSession);
        // return $thisAudio;
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


    //добавить аудисессию в абонемент
    public function addInAbonement(AudioSession $audioForAbonement)
    {
        //audiosession_id
        //abonement_id
        $bean = R::dispense('audiosforaudiosession');
        $bean->audiosession_id = $audioForAbonement->getAudiosession_id();
        $bean->abonement_id = $audioForAbonement->getAbonement_id();
        R::store($bean);
    }

    //удалить аудисессию из абонемента
    public function removeFromAbonement(AudioSession $removedAudiosession)
    {   // audiosession_id 
        // abonement_id
        $audiosession_id = $removedAudiosession->getAudiosession_id();
        $abonement_id = $removedAudiosession->geAbonement_id();
        $findAudiosession = R::getRow('SELECT * FROM audiosessions_for_abonement WHERE audiosession_id=? 
                                AND abonement_id=?', [$audiosession_id, $abonement_id]);
        $audiosession_id = $findAudiosession['id'];

        $bean = R::load('audiosessions_for_abonement', $audiosession_id);
        R::trash($bean); 
    }


    // --------------------------------вспомогательные----------------------------

    public function convertToObject(array $data): AudioSession
    {

        // Получаем отражение класса
        $refl = new \ReflectionClass(AudioSession::class);
        // Создаем объект игнорируя конструктор
        /** @var AudioSession $object */
        $object = $refl->newInstanceWithoutConstructor();

        // Получаем все свойства которые есть в классе AudioSession
        $props = $refl->getProperties();

        // Заполняем свойства
        foreach ($props as $prop){
            $prop->setAccessible(true);

            if(isset($data[$prop->getName()])){
                $prop->setValue($object, $data[$prop->getName()]);
            }
        }

        return $object;
    }


}