<?php

namespace App\Core;

class Router
{

    protected $routes = [];

    public function add($method, $uri, $controller, $function)
    {

        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'function' => $function
        ];
    }

    public function get($uri, $controller, $function)
    {

        $this->add('GET', $uri, $controller, $function);
    }

    public function post($uri, $controller, $function)
    {

        $this->add('POST', $uri, $controller, $function);
    }

    public function delete($uri, $controller, $function)
    {

        $this->add('DELETE', $uri, $controller, $function);
    }

    public function route($uri, $method)
    {

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                $className = basename($route['controller'], '.php');
                require base_path("App/" . $route['controller']);
                $fullClassName = "\\App\\Controllers\\" . $className;
                $controller = new $fullClassName;
                return $controller->{$route['function']}();
            }
        }

        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);

        require base_path("App/Views/{$code}.php");

        die();
    }
}
