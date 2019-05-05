<?php
declare(strict_types=1);

namespace App\AudioSession\Repository;

use RedBeanPHP\R;
use App\AudioSession\Entity\AudioSessionDTO;
use App\AudioSession\Entity\AudioForAUdiosessionDTO;

class AudioSessionRepository
{   
    /**
     * @return AudioSessionDTO[]
     */
    public function getAll(): array
    {
        $allAudioSessions = R::getAll("SELECT * FROM audiosessions");

        $listAudioSessions = [];
        foreach ($allAudioSessions as $audioSession){
            $listAudioSessions[] = $this->convertToObject($audioSession);
        }

        return $listAudioSessions;
    }

    public function getOneAudioSession(int $id): AudioSessionDTO
    {
        $data = R::getRow("SELECT * FROM audiosessions WHERE id = ?", [$id]);
        return $this->convertToObject($data);
    }
    

    /**
     * @param AudioSession $audioSession
     * @return AudioSession
     */
    public function saveAudiosession(AudioSessionDTO $audioSession): AudioSessionDTO
    {
        $bean = R::dispense("audiosessions");

        $bean->name = $audioSession->getName();
        $bean->image = $audioSession->getImage();
        $bean->description = $audioSession->getDescription();
        $bean->price = $audioSession->getPrice();

        R::store($bean);
    }

    public function getAudiosessionBD(AudioSessionDTO $audioSession_id ){
        
        $thisAudiosession = R::getRow('SELECT * FROM audiosessions WHERE id =?', [$audioSession_id]);
        $thisAudiosession = $this->convertToObject($thisAudiosession);

        $audioForAudiosession = R::getRow('SELECT * FROM audio_for_audiosession WHERE audiosession_id = ?',[$audiosession_id]);
        $audioForAudiosession = $this->convertToObject($audioForAudiosession);

        $thisAudiosession['audio_for_audiosession'] = $audioForAudiosession;
        $dataAudiosession = new AudiosessionDTO(); 

        $audioForAudiosession = $this->convertToObject($thisAudiosession);

    }

    




    // --------------------------------вспомогательные----------------------------
    public function getAudioForAudiosession(int $audiosession_id){
        
        $listAudio[] = R::getRow('SELECT * FROM audio_for_audiosession 
                                        WHERE aaudiosession_id = ?', [$audiosession_id]);
        
        
        foreach ($listAudio as $audio){
            $listAudio[] = $this->convertToObject($audio);
        }
        return $listAudio;

    }

    public function convertToObject(array $data): AudioSessionDTO
    {

        // Получаем отражение класса
        $refl = new \ReflectionClass(AudioSessionDTO::class);
        // Создаем объект игнорируя конструктор
        /** @var AudioSessionDTO $object */
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