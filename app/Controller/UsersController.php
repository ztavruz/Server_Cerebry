<?php
declare(strict_types=1);

namespace App\Controller;


use App\Service\UsersService;

class UsersController
{
    /**
     * @var UsersService
     */
    private $service;

    public function __construct(UsersService $service)
    {

        $this->service = $service;
    }
    public function listAll(){

        $listUsers = $this->service->list();

        echo $this->json($listUsers); 

    }
    public function createUser(){

        $content = json_decode(file_get_contents('php://input'), true);

        $user = $this->service->create(
            $content['firstName'],$content['lastName'],$content['middleName'],$content['gender'],$content['birthday'],
            $content['password'],$content['email'],$content['skype'],$content['phone'],$content['region'],
            $content['city'],$content['street'],$content['build'],$content['flat'],$content['approved'],
            $content['role'],$content['registration_date'],$content['zip_code']
        );

        echo $this->json($user);
    }

    
}