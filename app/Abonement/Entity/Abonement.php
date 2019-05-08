<?php
declare(strict_types=1);

namespace App\Abonement\Entity;


class Abonement{
    // id
    // name
    // cost 
    // abonement_id
    // user_id
    // time_start
    // time_end

    private $id;
    private $name;
    private $cost ;

    private $abonement_id;
    private $user_id;
    private $time_start;
    private $time_end;
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
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
     * Get the value of cost
     */ 
    public function getCost()
    {
        return $this->cost;
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
     * Get the value of abonement_id
     */ 
    public function getAbonement_id()
    {
        return $this->abonement_id;
    }

    /**
     * Set the value of abonement_id
     *
     * @return  self
     */ 
    public function setAbonement_id($abonement_id)
    {
        $this->abonement_id = $abonement_id;

        return $this;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of time_start
     */ 
    public function getTime_start()
    {
        return $this->time_start;
    }

    /**
     * Set the value of time_start
     *
     * @return  self
     */ 
    public function setTime_start($time_start)
    {
        $this->time_start = $time_start;

        return $this;
    }

    /**
     * Get the value of time_end
     */ 
    public function getTime_end()
    {
        return $this->time_end;
    }

    /**
     * Set the value of time_end
     *
     * @return  self
     */ 
    public function setTime_end($time_end)
    {
        $this->time_end = $time_end;

        return $this;
    }
}