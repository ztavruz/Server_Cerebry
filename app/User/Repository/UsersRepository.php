<?php
declare(strict_types=1);

namespace App\User\Repository;

use RedBeanPHP\R;
use App\User\Entity\User;

class UsersRepository
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

    public function save(User $user): User
    {
        $bean = R::dispense("users");

        $bean->name = $user->getName();
        $bean->description = $user->getDescription();
        $bean->price = $user->getPrice();
        $bean->image = $user->getImage();

        $bean->firstName = $user->getFirstName();
        $bean->lastName = $user->getLastName();
        $bean->middleName = $user->getMiddleName();
        $bean->password = $user->getPassword();
        $bean->birthday = $user->getBirthday();
        $bean->email = $user->getEmail();
        $bean->approved = $user->getApproved(); 
        $bean->phone = $user->getPhone();
        $bean->role = $user->getRole();
        $bean->registration_date = $user->getRegistration_date();
        $bean->region = $user->getRegion();
        $bean->city = $user->getCity();
        $bean->street = $user->getStreet();
        $bean->build = $user->getBuild();
        $bean->flat = $user->getFlat();
        $bean->zip_code = $user->getZip_code();
        $bean->skype = $user->getSkype();
        $bean->gender = $user->getGender();

        R::store($bean);
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