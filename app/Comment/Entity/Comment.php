<?php
declare(strict_types=1);

namespace App\Comment\Entity;

class Comment{
    // id
    // user_id
    // audiosession_id
    // time
    // approved
    // comment_id
    // audiosession_id
    public $id;
    public $user_id;
    public $audiosession_id;
    public $text;
    public $time;
    public $approved;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Get the value of audiosession
     */ 
    public function getAudiosession_id()
    {
        return $this->audiosession_id;
    }

    /**
     * Get the value of text
     */ 
    public function getText()
    {
        return $this->text;
    }

    /**
     * Get the value of time
     */ 
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Get the value of approved
     */ 
    public function getApproved()
    {
        return $this->approved;
    }
}