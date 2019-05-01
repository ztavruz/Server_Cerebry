<?php
declare(strict_types=1);

namespace App\Repository;


use App\Entity\AudioSession;
use RedBeanPHP\R;

class AudioSessionRepository implements AudioSessionRepositoryInterface
{

    public function one(int $id): AudioSession
    {
        $data = R::getRow("SELECT * FROM audiosessions WHERE id = ?", [$id]);
        return $this->convertToObject($data);
    }
    /**
     * @return AudioSession[]
     */
    public function all(): array
    {
        $data = R::getAll("SELECT * FROM audiosessions");

        $result = [];
        foreach ($data as $arr){
            $result[] = $this->convertToObject($arr);
        }

        return $result;
    }

    /**
     * @param AudioSession $audioSession
     */
    public function save(AudioSession $audioSession): void
    {
        /**
         * set id into object
         */
        $bean = R::dispense("audiosessions");

        $bean->name = $audioSession->getName();
        $bean->description = $audioSession->getDescription();
        $bean->price = $audioSession->getPrice();
        $bean->image = $audioSession->getImage();

        R::store($bean);
    }

    private function convertToObject(array $data): AudioSession
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