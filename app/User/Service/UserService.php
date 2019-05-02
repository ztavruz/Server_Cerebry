<?php
declare(strict_types=1);

namespace App\User\Service;

use App\AbstractClasses\Service;
use App\User\Entity\User;
use App\User\Repository\UsersRepository;

class UserService implements Service
{
    private $repository;

    public function __construct(UsersRepository $repository){
        $this->repository = $repository;
    }

    public function list(): array
    {
        return $this->repository->getAll();
    }

    public function create( string $firstName, string $lastName, string $middleName, int $gender,
                            int $password, string $birthday, string $email, string $skype, int $phone,
                            string $region, string $city, string $street, int $build, string $flat,
                            bool $approved,int $role,int $registration_date, string $zip_code )
    {
        $newUser = new User( $firstName, $lastName, $middleName,  $gender,
                             $password, $birthday, $email, $skype,  $phone,
                             $region, $city, $street,  $build, $flat,
                             $approved, $role, $registration_date, $zip_code);
        $this->repository->save($newUser);    
        
        return $newUser;
    }
}