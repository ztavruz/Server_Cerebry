<?php
declare(strict_types=1);

namespace App\General\Entity;

class Helper
{
    public function convertToObjectAudio(array $data): Audio
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

    public function convertToObjectAudioSession(array $data): AudioSession
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

    public function convertToObjectComment(array $data): Comment
    {

        // Получаем отражение класса
        $refl = new \ReflectionClass(Comment::class);
        // Создаем объект игнорируя конструктор
        /** @var Comment $object */
        $object = $refl->newInstanceWithoutConstructor();

        // Получаем все свойства которые есть в классе CommentDTO
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
    
    public function convertToObjecOne_to_many(array $data): One_to_many
    {

        // Получаем отражение класса
        $refl = new \ReflectionClass(One_to_many::class);
        // Создаем объект игнорируя конструктор
        /** @var One_to_many $object */
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