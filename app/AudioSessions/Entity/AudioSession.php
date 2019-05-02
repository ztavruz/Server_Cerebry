<?php
declare(strict_types=1);

namespace App\AudioSessions\Entity;


class AudioSession
{
    private $id;

    private $name;

    private $description;

    private $image;

    private $price;

        public function __construct(string $name, string $description, string $image, int $price)
        {
            $this->name = $name;
            $this->description = $description;
            $this->image = $image;
            $this->price = $price;
        }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }
}