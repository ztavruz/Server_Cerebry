<?php
declare(strict_types=1);

namespace App\User\Service;

use App\User\Entity\UserDTO;
use App\User\Entity\UserAccount;
use App\User\Repository\RepositoryUser;

class ServiceUser
{
    private $repository;

    public function __construct(RepositoryUser $repository){
        $this->repository = $repository;
    }

    public function list(): array
    {
        return $this->repository->getAll();
    }

    public function newUserAccount(array $content)
    {   
        $userData = new UserDTO();
        $userData->email = $content['email'];
        $userData->email = $content['password'];

        $userDataRegistracion = new UserAccount($userData);
        $this->repository->saveAccount($userDataRegistracion);
        return $userDataRegistracion;
    }
    public function authorUser()
    {
        $userData = new UserDTO();
        $userData->email = $content['email'];
        $userData->email = $content['password'];
        
        $userDataAuthorization = new UserAccount($userData);
        $this->repository->getAccount($userDataAuthorization);
        return $userDataAuthorization;
    }

}