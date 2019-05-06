<?php
declare(strict_types=1);

namespace App\AudioSession\Entity;

    // id
    // name
    // image
    // discription
    // cost
    // audiosession_id
    // abonement_id

class AudioSession
{
    private $id;
    private $name;
    private $image;
    private $description;
    private $cost;
    private $audiosession_id;
    private $abonement_id;


    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    public function getAudiosession_id()
    {
        return $this->audiosession_id;
    }

    public function setAudiosession_id($audiosession_id)
    {
        $this->audiosession_id = $audiosession_id;

        return $this;
    }

    public function getAbonement_id()
    {
        return $this->abonement_id;
    }

    public function setAbonement_id($abonement_id)
    {
        $this->abonement_id = $abonement_id;

        return $this;
    }
}


    