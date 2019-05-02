<?php
declare(strict_types=1);

namespace App\User\Entity;


class UserDTO{
    public $id;   
    public$email;
    public $password;
    public $repassword;
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
}