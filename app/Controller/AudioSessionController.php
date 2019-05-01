<?php
declare(strict_types=1);

namespace App\Controller;


use App\Service\AudioSessionService;

class AudioSessionController extends AbstractController
{
    private $service;

    public function __construct(AudioSessionService $service)
    {
        $this->service = $service;
    }

    public function list()
    {
        $session = $this->service->list();

        echo $this->json($session);
    }

    public function create()
    {
        /**
         * POST
         * JSON
         *  name: string,
         *  description: string,
         *  image: string,
         *  price: int
         *
         */

        $content = json_decode(file_get_contents('php://input'), true);

        $audioSession = $this->service->create(
            $content['name'], $content['description'],
            $content['image'], $content['price']
        );

        echo $this->json($audioSession);
    }

}