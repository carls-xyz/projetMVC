<?php

class Router
{
    private array $routes = [];

    public function get(string $path, string $controller, string $method): void
    {
        $this->routes['GET'][$path] = [$controller, $method];
    }

    public function post(string $path, string $controller, string $method): void
    {
        $this->routes['POST'][$path] = [$controller, $method];
    }

    public function dispatch(string $uri, string $httpMethod = 'GET'): void
    {
        $path = parse_url($uri, PHP_URL_PATH);

        $httpMethod = strtoupper($httpMethod);
        if (!isset($this->routes[$httpMethod][$path])) {
            http_response_code(404);
            echo 'Page non trouvée';
            return;
        }

        [$controllerClass, $method] = $this->routes[$httpMethod][$path];

        if (!class_exists($controllerClass)) {
            http_response_code(500);
            echo "Contrôleur $controllerClass introuvable";
            return;
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $method)) {
            http_response_code(500);
            echo "Méthode $method introuvable dans $controllerClass";
            return;
        }

        $controller->$method();
    }
}
