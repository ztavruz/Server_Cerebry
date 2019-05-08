<?php
declare(strict_types=1);

namespace App\Abonement\Service;

use App\Abonement\Entity\Abonement;
use App\Abonement\Repository\AbonementRepository;

class AbonementService
{

    private $repository;

    public function __construct(AbonementRepository $repository)
    {
        $this->repository = $repository;
    }

    // tested +
    //создать абонемент
    public function create(array $data_post)
    {   // id
        // name
        // time_start
        // time_end
        // cost 
        // active
    
        $newAbonement = new Abonement();
        $newAbonement->setName($data_post['name']);
        $newAbonement->seTime_start($data_post['time_start']);
        $newAbonement->setTime_end($data_post['time_end']);
        $newAbonement->setCost($data_post['cost']);

        $this->repository->create($newAbonement);
    }

    // tested +
    //получить абонемент из БД по id
    public function getOne(array $data_post): Audio
    {   // id
        $thisAbonement = new Audio();
        $thisAbonement->setId($data_post['id']);

        $thisAbonement = $this->repository->getOne($thisAbonement);
        return $thisAbonement;
    }

    // tested +
    //изменить абонемент 
    public function change(array $data_post)
    {   // id
        // name
        // time_start
        // time_end
        // cost 
        // abonement_id
        // user_id 
        $changeableAbonement = new Abonement();
        $changeableAbonement->setId($data_post['id']);
        $changeableAbonement->setName($data_post['name']);
        $changeableAbonement->setImage($data_post['image']);
        $changeableAbonement->setDescription($data_post['description']);
        $changeableAbonement->setCost($data_post['cost']);

        $changeableAbonement = $this->repository->change($changeableAbonement);
        
    }

    // tested +
    //добавить абонемент к пользователю
    public function addInAbonement(array $data_post)
    {   // abonement_id
        // user_id
        // time_start
        // time_end
        $abonementForUser = new Abonement();
        $abonementForUser->setAudiosession_id($data_post['abonement_id']);
        $abonementForUser->setAbonement_id($data_post['user_id']);
        $abonementForUser = $this->repository->addInAbonement($abonementForUser);

       
    }

    // tested +
    //удалить абонемент у пользователя
    public function removeFromAbonement(array $data_post)
    {   // abonement_id
        // user_id
        // time_start
        // time_end
        $removedUser = new Abonement();
        $removedUser->setAudiosession_id($data_post['abonement_id']);
        $removedUser->setAbonement_id($data_post['user_id']);
        $removedUser = $this->repository->removeFromAbonement($removedUser);

    }


}