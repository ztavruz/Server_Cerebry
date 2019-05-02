<?php
declare(strict_types=1);

namespace App\AudioSessions\Repository;

use RedBeanPHP\R;
use App\AudioSessions\Entity\AudioSession;

class AudioSessionRepository implements Repository
{   
    /**
     * @return AudioSession[]
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

    public function getOne(int $id): AudioSession
    {
        $data = R::getRow("SELECT * FROM audiosessions WHERE id = ?", [$id]);
        return $this->convertToObject($data);
    }
    

    /**
     * @param AudioSession $audioSession
     * @return AudioSession
     */
    public function save(AudioSession $audioSession): AudioSession
    {
        $bean = R::dispense("audiosessions");

        $bean->name = $audioSession->getName();
        $bean->description = $audioSession->getDescription();
        $bean->price = $audioSession->getPrice();
        $bean->image = $audioSession->getImage();

        R::store($bean);
    }

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