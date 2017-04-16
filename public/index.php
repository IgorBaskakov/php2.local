<?php

require_once __DIR__ . '/../protected/autoload.php';

$request = new \App\Components\Request;
$result = $request->parsing($_SERVER['REQUEST_URI']);

$controllerName = $result['ctrl'];
$controllerClassName = '\\App' . $controllerName;

try {
    $controller = new $controllerClassName;
    $controller->action($result['act']);
} catch (\App\ErrorDb $ex) {
    $controllerError = new \App\Controllers\Errors;
    $controllerError->actionShowErrorDb($ex);
} catch (\App\Error404 $ex) {
    $controllerError = new \App\Controllers\Errors;
    $controllerError->actionShowError404($ex);
} catch (\App\Errors $errors) {
    $controllerError = new \App\Controllers\Errors;
    $controllerError->actionShowAllErrors($errors);
} catch (Throwable $ex) {
    $controllerError = new \App\Controllers\Errors;
    $controllerError->actionShowError($ex);
}