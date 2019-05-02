<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\UsersService;

class UsersController extends Controller
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

    public function registrationNewUser(){
        $content = json_decode(file_get_contents('php://input'), true);
        $newUser = $this->service->newUserAccount($content);

        echo $this->json($newUser);
    }

    public function autorizationUser(){
        $content = json_decode(file_get_contents('php://input'), true);
        $newUser = $this->service->authorUser($userData);

        echo $this->json($newUser);
    }

    
}