<?php
class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];
    public static function load($file)
    {
        $router = new Router;
        require $file;
        return $router;
    }
    public function register($routes)
    {
        $this->routes = $routes;
    }
    public function get($uri, $controller)
    {
        return $this->routes['GET'][$uri] = $controller;
    }
    public function post($uri, $controller)
    {
        return $this->routes['POST'][$uri] = $controller;
    }
    public function callMethod($class, $method)
    {
        $myClass = new $class;
        $myClass->$method();
    }
    public function direct($uri, $method)
    {
        if (!array_key_exists($uri, $this->routes[$method])) {
            die('404 Page');
        };
        $data = $this->routes[$method][$uri];

        $this->callMethod($data[0], $data[1]);
    }
}
