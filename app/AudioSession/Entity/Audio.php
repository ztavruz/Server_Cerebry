<?php
declare(strict_types=1);

namespace App\AudioSession\Entity;


class Audio
{
    private $id;
    private $name;
    private $image;
    private $description;
    private $cost;
    private $audiosession_id;

    public function __construct(string $name, int $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return $this->cost;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
}