<?php
declare(strict_types=1);

namespace App\User\Entity;


class User
{
    private $id;
	private $firstName;
	private $lastName;
	private $middleName;
    private $birthday;
    private $password;
	private $email;
	private $approved; //(bool)
	private $phone;
	private $role; //(Roles)
    private $registration_date; //(timestamp)
    private $region;
    private $city;
    private $street;
    private $build;
    private $flat;
    private $zip_code;
    private $skype;
    private $gender; //(Enum 0, 1)

    public function __construct( string $firstName, string $lastName, string $middleName, int $gender,
                                 string $birthday, int $password, string $email, string $skype, int $phone,
                                 string $region, string $city, string $street, int $build, string $flat,
                                 bool $approved,int $role,int $registration_date, string $zip_code ){

        // личные данные
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->middleName = $middleName;
        $this->gender = $gender;
        $this->birthday = $birthday;

        
        $this->password = $password;
        $this->email = $email;
        $this->skype = $skype;
        $this->phone = $phone;

        $this->region = $region;
        $this->city = $city;
        $this->street = $street;
        $this->build = $build;
        $this->flat = $flat;

        $this->approved = $approved; //(bool)
        $this->role = $role; //(Roles)
        $this->registration_date = $registration_date; // (timestamp)
        $this->zip_code = $zip_code; // (Enum 0, 1)
    }
    public function getId(){
        return  $this->id;
    }
    public function getFirstName(){
        return $this->firstName;
    }
    public function getLastName(){
        return $this->lastName;
    }
    public function getMiddleName(){
        return $this->middleName;
    }
    public function getGender(){
        return $this->gender;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getBirthday(){
        return $this->birthday;
    }
    public function getEmail(){
        return  $this->email;
    }
    public function getSkype(){
        return $this->skype;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getRegion(){
        return $this->region;
    }
    public function getCity(){
        return $this->city;
    }
    public function getStreet(){
        return $this->street;
    }
    public function getBuild(){
        return $this->build;
    }
    public function getFlat(){
        return $this->flat;
    }
    public function getApproved(){
        return $this->approved;
    }
    public function getRole(){
        return $this->role;
    }
    public function getRegistration_date(){
        return $this->registration_date;
    }
    public function getZip_code(){
        return $this->zip_code;
    }

}