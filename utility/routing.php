<?php
function isGet(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function isPost(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function isPut(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'PUT';
}

function isDelete(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'DELETE';
}


function route(string $path, callable $callback): void
{
    $requestPath = explode('/', trim($_SERVER['PATH_INFO'] ?? '', '/'));
    $routePath = explode('/', trim($path, '/'));

    if (count($requestPath) !== count($routePath)) {
        return;
    }

    $params = [];
    for ($i = 0; $i < count($routePath); $i++) {
        if ($routePath[$i] !== $requestPath[$i] && $routePath[$i] !== '?') {
            return;
        }
        if ($routePath[$i] === '?') {
            $params[] = $requestPath[$i];
        }
    }

    $callback(...$params);
    exit;
}