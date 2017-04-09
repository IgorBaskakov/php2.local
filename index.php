<?php

require_once __DIR__ . '/protected/autoload.php';

$request = new \App\Request;
$result = $request->parsing($_SERVER['REQUEST_URI']);

$controllerName = $result['ctrl'];
$controllerClassName = '\\App' . $controllerName;
$controller = new $controllerClassName;

try {

    $controller->action($result['act']);

} catch (\App\DbErrors $ex) {

    $controllerError = new \App\Controllers\Errors;
    $controllerError->actionShowErrorDb($ex);

} catch (\App\Error404 $ex) {

    $controllerError = new \App\Controllers\Errors;
    $controllerError->actionShowError404($ex);

} catch (Throwable $ex) {

    $controllerError = new \App\Controllers\Errors;
    $controllerError->actionShowOtherErrors($ex);

}
