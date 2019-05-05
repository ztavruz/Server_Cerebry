<?php
declare(strict_types=1);

namespace App\User\Service;

use App\User\Entity\UserDTO;
use App\User\Repository\UserRepository;

class UserService
{
    private $repository;

    public function __construct(UserRepository $repository){
        $this->repository = $repository;
    }

    public function list(): array
    {
        return $this->repository->getAll();
    }

    public function generationDataUser(array $content){
        $userData = new UserDTO();
        $userData->id = $content['id'];
        $userData = $this->repository->getDataAccount($userData);
        return $userData;
    }

    public function createNewUserAccount(array $content)
    {   
        $userData = new UserDTO();
        $userData->email = $content['email'];
        $userData->password = $content['password'];

        $userData = $this->repository->saveAccount($userData);
        return $userData;
    }
    public function authorUser(array $content)
    {
        $userData = new UserDTO();
        $userData->email = $content['email'];
        $userData->email = $content['password'];
        
        $this->repository->getAccount($userData);
        return $userData;
    }

}