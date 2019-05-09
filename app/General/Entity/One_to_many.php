<?php
declare(strict_types=1);

namespace App\General\Entity;

    // id
    // audiosession_id
    // audio_id

class One_to_many
{
    private $one;
    private $many;
    private $search_table;

    // public function __consrtruct($one, $many, $search_table){

    // }

    /**
     * Get the value of one
     */ 
    public function getOne()
    {
        return $this->one;
    }

    /**
     * Set the value of one
     *
     * @return  self
     */ 
    public function setOne($one)
    {
        $this->one = $one;

        return $this;
    }

    /**
     * Get the value of many
     */ 
    public function getMany()
    {
        return $this->many;
    }

    /**
     * Set the value of many
     *
     * @return  self
     */ 
    public function setMany($many)
    {
        $this->many = $many;

        return $this;
    }

    /**
     * Get the value of search_table
     */ 
    public function getSearch_table()
    {
        return $this->search_table;
    }

    /**
     * Set the value of search_table
     *
     * @return  self
     */ 
    public function setSearch_table($search_table)
    {
        $this->search_table = $search_table;

        return $this;
    }
}