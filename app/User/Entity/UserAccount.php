<?php
declare(strict_types=1);

namespace App\User\Entity;

use App\User\Entity\User;

class UserAccount {
    
    public $email;
    public $password;


    public function __construct(UserDTO $userData){
        $this->email = $userData->email;
        $this->password = $userData->password;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }
    
}