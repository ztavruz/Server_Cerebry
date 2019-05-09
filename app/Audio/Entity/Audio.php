<?php
declare(strict_types=1);

namespace App\Audio\Entity;

class Audio
{
    private $id;
    private $name;
    private $image;
    private $description;
    private $cost;
     
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getAudio_id()
    {
        return $this->audio_id;
    }

    public function getAudiosession_id()
    {
        return $this->audiosession_id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    public function setAudio_id($audio_id)
    {
        $this->audio_id = $audio_id;

        return $this;
    }

    public function setAudiosession_id($audiosession_id)
    {
        $this->audiosession_id = $audiosession_id;

        return $this;
    }
}