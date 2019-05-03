<?php
declare(strict_types=1);

namespace App\Controller;


use App\Controller\Controller;
use App\AudioSessions\Service\AudioSessionService;

class AudioSessionController extends Controller
{
    private $service;

    public function __construct(AudioSessionService $service)
    {
        $this->service = $service;
    }

    public function listAll()
    {
        $listAudioSessions = $this->service->list();

        echo $this->json($listAudioSessions);
    }

    public function createAudioSession()
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