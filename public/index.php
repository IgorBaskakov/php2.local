<?php

require_once __DIR__ . '/../protected/autoload.php';

$request = new \App\Components\Request;
$result = $request->parsing($_SERVER['REQUEST_URI']);

$controllerName = $result['ctrl'];
$controllerClassName = '\\App' . $controllerName;
$logger = \App\Components\Logger::instance();

try {

    $controller = new $controllerClassName;
    $controller->action($result['act']);

} catch (\App\ErrorDb $ex) {

    $controllerError = new \App\Controllers\Errors;
    $controllerError->actionShowError($ex);
    $logger->writeLog('Ошибка в работе с БД', $ex);

} catch (\App\Error404 $ex) {

    $controllerError = new \App\Controllers\Errors;
    $controllerError->actionShowError404($ex);
    $logger->writeLog('Данные не найдены', $ex);

} catch (\App\Errors $errors) {

    foreach ($errors as $error) {
        $logger->writeLog('Ошибка ввода данных', $error);
    }
    $controllerError = new \App\Controllers\Errors;
    $controllerError->actionShowAllErrors($errors);

} catch (Throwable $ex) {

    $controllerError = new \App\Controllers\Errors;
    $controllerError->actionShowError($ex);
    $logger->writeLog('Неопознанная ошибка', $ex);

}