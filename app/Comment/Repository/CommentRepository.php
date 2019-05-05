<?php
declare(strict_types=1);

namespace App\Comment\Repository;

use RedBeanPHP\R;
use App\Comment\Entity\CommentDTO;

class CommentRepository{

    public function saveComment(CommentDTO $newComment)
    {
        // -id
        // -user_id
        // -audiosession_id
        // -text
        // -time
        // -approved (bool)
        $bean = R::dispense("comments");
        $bean->user_id = $newComment->getUser_id();
        $bean->audiosession_id = $newComment->getAudiosession_id();
        $bean->text = $newComment->getText();
        $bean->time = $newComment->getTime();
        $bean->approved = true;
        R::store($bean);

    }

    public function getAll(): array
    {
        $allUsers = R::getAll('SELECT * FROM users');
        $listUsers = [];
        foreach($allUsers as $user){
            $listUsers[] = $this->convertToObject($user);
        }
        return $listUsers;
    }

    public function getComments(CommentDTO $dataComment): array
    {
        $audiosession_id = $dataComment->getAudiosession_id();
        $allComments = R::getAll('SELECT * FROM comments WHERE audiosession_id = ?',[$audiosession_id]);
        $listComments = [];
        foreach($listComments as $comment){
            $listComments[] = $this->convertToObject($comment);
        }
        
        return $listComments;
    }

    public function convertToObject(array $data): CommentDTO
    {

        // Получаем отражение класса
        $refl = new \ReflectionClass(CommentDTO::class);
        // Создаем объект игнорируя конструктор
        /** @var CommentDTO $object */
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

}