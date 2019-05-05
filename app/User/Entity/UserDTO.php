<?php
declare(strict_types=1);

namespace App\User\Entity;


class UserDTO{
    public $id;   
    public $email;
    public $password;
    public $lastName;
    public $firstName;
    public $middleName;
    public $birthday;
    public $phone;
    public $role; //(Roles)
    public $registration_date; //(timestamp)
    public $region;
    public $city;
    public $street;
    public $build;
    public $flat;
    public $zip_code;
    public $skype;
    public $gender; 
    public $abonements_for_user = [];
    
    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getMiddleName()
    {
        return $this->middleName;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getRegistration_date()
    {
        return $this->registration_date;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getBuild()
    {
        return $this->build;
    }

    public function getFlat()
    {
        return $this->flat;
    }

    public function getZip_code()
    {
        return $this->zip_code;
    }

    public function getSkype()
    {
        return $this->skype;
    }

    public function getGender()
    {
        return $this->gender;
    }
    public function getAbonements_for_user()
    {
        return $this->abonements_for_user;
    }
}