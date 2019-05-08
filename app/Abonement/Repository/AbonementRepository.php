<?php
declare(strict_types=1);

namespace App\Abonement\Repository;

use RedBeanPHP\R;
use App\Abonement\Entity\Abonement;

class AbonementRepository
{   
    //создать аудио
    public function create(Audio $newAbonement)
    {
        $newAbonement->setName($data_post['name']);
        $newAbonement->seTime_start($data_post['time_start']);
        $newAbonement->setTime_end($data_post['time_end']);
        $newAbonement->setCost($data_post['cost']);

        $bean = R::dispense("audios");
        $bean->name = $newAbonement->getName();
        $bean->image = $newAbonement->getTime_start();
        $bean->description = $newAbonement->setTime_end();
        $bean->cost = $newAbonement->getCost();
        R::store($bean);
    }

    //получить аудио зб БД по id
    public function getOne(Audio $thisAbonement)
    {
        $thisAbonement_id = $thisAbonement->getId();
        $thisAbonement = R::getRow("SELECT * FROM abonements WHERE id = ?", [$thisAbonement_id]);
        return $this->convertToObject($thisAbonement);

        return $thisAbonement;
    }

    //изменить аудио 
    public function change(Audio $changeableAudio)
    {   // id
        // name 
        // Image
        // discription
        // cost  
        $changeableAudio_id = $changeableAudio->getId();

        $bean = R::load('audios', $changeableAudio_id);
        $bean->name = $changeableAudio->getName();
        $bean->image= $changeableAudio->getImage();
        $bean->description = $changeableAudio->getDescription();
        $bean->cost = $changeableAudio->getCost();
        R::store($bean);
    }


    //добавить аудио в аудиосессию
    public function addInAudiosession(Audio $audioForAudiosession)
    {
        // id 
        // audiosession_id
        $bean = R::dispense('audiosforaudiosession');
        $bean->audio_id = $audioForAudiosession->getAudio_id();
        $bean->audiosession_id = $audioForAudiosession->getAudiosession_id();
        R::store($bean);
    }

    //удалить аудио из аудиосессии
    public function removeFromAudiosession(Audio $removedAudio)
    {   
        $audio_id = $removedAudio->getAudio_id();
        $audiosession_id = $removedAudio->getAudiosession_id();
        $findAudio = R::getRow('SELECT * FROM audiosforaudiosession WHERE audio_id=? 
                                AND audiosession_id=?', [$audio_id, $audiosession_id]);
        $audio_id = $findAudio['id'];

        $bean = R::load('audiosforaudiosession', $audio_id);
        R::trash($bean); 
    }

    // -----------------------------------------вспомогательные-------------------------

    public function convertToObject(array $data): Audio
    {

        // Получаем отражение класса
        $refl = new \ReflectionClass(Audio::class);
        // Создаем объект игнорируя конструктор
        /** @var Audio $object */
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