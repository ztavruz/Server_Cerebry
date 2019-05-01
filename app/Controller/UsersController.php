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

    public function signup()
    {
        var_dump($this->service);
    }
}