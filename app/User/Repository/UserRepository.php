<?php
declare(strict_types=1);

namespace App\User\Repository;

use RedBeanPHP\R;
use App\User\Entity\User;
use App\User\Entity\UserAccount;

class UserRepository
{
    public function getAll(): array
    {
        $allUsers = R::getAll('SELECT * FROM users');
        $listUsers = [];
        foreach($allUsers as $user){
            $listUsers[] = $this->convertToObject($user);
        }
        return $listUsers;
    }

    public function getOne(int $id): User 
    {
        $thisUser = R::getRow('SELECT FROM users WHERE id = ?', [$id]);
        return $this->convertToObject($thisUser);
    }

    public function getAccount(UserDTO $userDataAuthorization){
        $email = $userDataAuthorization->getEmail();
        $password = $userDataAuthorization->getPassword();
        $userDataBd = R::getRow('SELECT FROM users WHERE email = ?', [$email]);
        if($email == $userDataBd['email'] && $password == $userDataBd['password']){
            return $userDataBd;
        }
        return "Пользователь не найден";
    }

    // регистрация пользователя в БД
    public function saveAccount(UserAccount $account)
    {   
        {
            $bean = R::dispense("users");
            $bean->email = $account->getEmail();
            $bean->password = $account->getPassword();
            R::store($bean);
        }
    
    }

    public function convertToObject(array $data): User
    {

        // Получаем отражение класса
        $refl = new \ReflectionClass(User::class);
        // Создаем объект игнорируя конструктор
        /** @var User $object */
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