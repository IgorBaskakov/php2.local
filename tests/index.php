<?php
/*
require_once __DIR__ . '/../protected/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/', $uri);
var_dump($parts);

if (!empty($parts[2])) {
    $controllerName = $parts[2];
} else {
    $controllerName = 'Index';
}

$controllerClassName = '\\App\\Controllers\Admin\\' . $controllerName;

$controller = new $controllerClassName;

if (!empty($parts[3])) {
    $controller->action($parts[3]);
    $controller->actionPass();
} else {
    $controller->action('Default');
}
*/