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
    
    private $audio_id;
    private $audiosession_id;
    
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get the value of cost
     */ 
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Get the value of discription
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of audio_id
     */ 
    public function getAudio_id()
    {
        return $this->audio_id;
    }

    /**
     * Get the value of audiosession_id
     */ 
    public function getAudiosession_id()
    {
        return $this->audiosession_id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Set the value of discription
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the value of cost
     *
     * @return  self
     */ 
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Set the value of audio_id
     *
     * @return  self
     */ 
    public function setAudio_id($audio_id)
    {
        $this->audio_id = $audio_id;

        return $this;
    }

    /**
     * Set the value of audiosession_id
     *
     * @return  self
     */ 
    public function setAudiosession_id($audiosession_id)
    {
        $this->audiosession_id = $audiosession_id;

        return $this;
    }
}