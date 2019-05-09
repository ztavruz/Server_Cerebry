<?php
declare(strict_types=1);

namespace App\AudioSession\Repository;

use App\AudioSession\Entity\Audio;
use App\AudioSession\Entity\AudioSessionAudio;
use RedBeanPHP\R;
use App\AudioSession\Entity\AudioSession;
use App\General\Entity\One_to_many;
use App\General\Entity\Helper;


class AudioSessionRepository
{   
    //создать аудисессию
    public function create(AudioSession $newAudioSession)
    {
        $bean = R::dispense("audiosessions");
        $bean->name = $newAudioSession->getName();
        $bean->image = $newAudioSession->getImage();
        $bean->description = $newAudioSession->getDescription();
        $bean->cost = $newAudioSession->getCost();
        R::store($bean);
    }

    //получить аудисессию из БД по id
    public function getOne(int $audioSession_id)
    {
        $dataAudioSession = R::getRow("SELECT * FROM audiosessions WHERE id = ?", [$audioSession_id]);

        $audioSession = new AudioSession();
        $audioSession->setId($dataAudioSession["id"]);
        $audioSession->setName($dataAudioSession["name"]);
        $audioSession->setName($dataAudioSession["cost"]);

        $dataAudioSessionAudio = R::getAll("SELECT * FROM audiosessionaudio WHERE audiosession_id = ?",
            [$audioSession->getId()]
        );



        foreach ($dataAudioSessionAudio as $row){

            $data = R::getRow("SELECT * FROM audios WHERE id = ?", [$row['audio_id']]);

            $audio = new Audio($data['name'], (int)$data['cost']);
            $audio->setId((int)$data['id']);
            $audioSession->addAudio($audio);

        }

        return $audioSession;

    }

    public function getAll()
    {
        $dataAudioSessions = R::getAll("SELECT * FROM audiosessions");

        $result = [];

        foreach ($dataAudioSessions as $row){
            $result[] = $this->getOne((int)$row['id']);
        }

        return $result;
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

    public function saveConnect(AudioSessionAudio $audioSessionAudio): void
    {
        $bean = R::dispense("audiosessionaudio");
        $bean->audiosession_id = $audioSessionAudio->getAudioSession()->getId();
        $bean->audio_id = $audioSessionAudio->getAudio()->getId();
        R::store($bean);
    }

    private function convertToObject(array $audioSession): AudioSession
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

            if(isset($audioSession[$prop->getName()])){
                $prop->setValue($object, $audioSession[$prop->getName()]);
            }
        }

        return $object;
    }

}