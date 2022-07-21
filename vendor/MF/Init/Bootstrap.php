<?php

namespace MF\Init;

abstract class Bootstrap {

    private $routes;

    abstract protected function initRoutes(): void;

    public function __construct() 
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function setRoutes(array $routes): void
    {
        $this->routes = $routes;
    }

    protected function run($url): void
    {
        foreach ($this->getRoutes() as $arrRoutes => $route) {
            if ($url == $route['route']) {
                $class = "App\\Controllers\\". ucfirst($route['controller']);

                $controller = new $class;
                $action = $route['action'];
                $controller->$action();
            }
        }
    }

    protected function getUrl(): string
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}

?>