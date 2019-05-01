<?php
declare(strict_types=1);

namespace Engine\Router;


class Router
{

    private $routes = [];

    public function register(string $url, string $controller, string $method): void
    {
        $this->routes[$url] = [$controller, $method];
    }

    /**
     * @param string $url
     * @return array
     */
    public function match(string $url): array
    {

        if( isset($this->routes[$url]) ){
            return $this->routes[$url];
        }

        throw new \LogicException("Маршут не найден");
    }

}