<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\Controller;
use App\User\Service\UserService;

class UserController extends Controller
{
    /**
     * @var UsersService
     */
    private $service;

    public function __construct(UserService $service)
    {

        $this->service = $service;
    }

    public function getUser(){
        //$content = user['id];
        $content = json_decode(file_get_contents('php://input'), true);
        $dataUser = $this->service->generationDataUser($content);
        echo $this->json($dataUser);
    }
    
    public function hello(){
        echo 'hello';
    }

    public function listAll(){

        $listUsers = $this->service->list();

        echo $this->json($listUsers); 

    }

    public function registrationNewUser(){
        $content = json_decode(file_get_contents('php://input'), true);
        $newUser = $this->service->createNewUserAccount($content);

        echo $this->json($newUser);
    }

    public function autorizationUser(){
        $content = json_decode(file_get_contents('php://input'), true);
        $newUser = $this->service->authorUser($userData);

        echo $this->json($newUser);
    }

    
}