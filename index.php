<?php

$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/', $uri);

require_once __DIR__ . '/protected/autoload.php';

if (!empty($parts[1])) {
    $controllerName = $parts[1];
} else {
    $controllerName = 'Index';
}

$controllerClassName = '\\App\\Controllers\\' . $controllerName;
$controller = new $controllerClassName;

if (!empty($parts[2])) {
    $controller->action($parts[2]);
} else {
    $controller->action('Default');
}

