<?php

require_once __DIR__ . '/protected/autoload.php';

$request = new \App\Request;
$result = $request->parsing($_SERVER['REQUEST_URI']);

$controllerName = $result['ctrl'];
$controllerClassName = '\\App' . $controllerName;
$controller = new $controllerClassName;
$controller->action($result['act']);