<?php

declare(strict_types=1);

class Router
{
    private array $routes = [];

    public function addRoute(string $method, string $path, string $handler): void
    {
        $this->routes[$method][$path] = $handler;
    }

    public function get(string $path, string $handler): void
    {
        $this->addRoute('GET', $path, $handler);
    }

    public function post(string $path, string $handler): void
    {
        $this->addRoute('POST', $path, $handler);
    }

    public function put(string $path, string $handler): void
    {
        $this->addRoute('PUT', $path, $handler);
    }

    public function delete(string $path, string $handler): void
    {
        $this->addRoute('DELETE', $path, $handler);
    }

    public function handleRequest(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $requestUri = $_SERVER['REQUEST_URI'];
        $path = parse_url($requestUri, PHP_URL_PATH);
        $path = trim($path, '/');

        // Check for exact match first
        if (isset($this->routes[$method][$path])) {
            $this->executeHandler($this->routes[$method][$path]);
            return;
        }

        // Check for routes with parameters
        foreach ($this->routes[$method] as $routePath => $handler) {
            $pattern = $this->convertRouteToRegex($routePath);
            if (preg_match($pattern, $path, $matches)) {
                array_shift($matches); // Remove the full match
                $this->executeHandler($handler, $matches);
                return;
            }
        }

        // No route found
        http_response_code(404);
        echo "404 Not Found";
    }

    private function convertRouteToRegex(string $route): string
    {
        return '#^' . preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $route) . '$#';
    }

    private function executeHandler(string $handler, array $params = []): void
    {
        [$controller, $action] = explode('@', $handler);
        $controllerInstance = new $controller();
        $controllerInstance->$action(...$params);
    }
}