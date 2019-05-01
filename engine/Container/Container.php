<?php
declare(strict_types=1);

namespace Engine\Container;


class Container
{
    private $definitions = [];

    public function set(string $id, $definition):void
    {
        $this->definitions[$id] = $definition;
    }

    public function get(string $id)
    {
        return $this->definitions[$id];
    }
}