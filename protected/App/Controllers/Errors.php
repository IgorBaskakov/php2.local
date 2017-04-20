<?php

namespace App\Controllers;

use App\Components\Logger;
use \App\Exceptions\DbException;
use \App\Exceptions\E404Exception;

/**
 * Class Errors
 * @package App\Controllers
 */
class Errors extends Controller
{
    /** @var Logger Should contain a logger */
    protected $logger;

    public function __construct()
    {
        parent::__construct();
        $this->logger = Logger::instance();
    }

    /**
     * @param DbException $error
     * @return void
     */
    public function actionShowErrorDb(DbException $error)
    {
        $this->view->error = $error->getMessage();
        $this->logger->writeLog('Ошибка в работе с БД', $error);
        $this->view->display(__DIR__ . '/../../templates/errors/error.php');
    }

    /**
     * @param E404Exception $error
     * @return void
     */
    public function actionShowError404(E404Exception $error)
    {
        $this->view->error = $error->getMessage();
        $this->logger->writeLog('Данные не найдены', $error);
        header("HTTP/1.0 404 Not Found");
        $this->view->display(__DIR__ . '/../../templates/errors/error404.php');
    }

    /**
     * @param \Baskakov\MultiException\Errors $errors
     * @return void
     */
    public function actionShowAllErrors(\Baskakov\MultiException\Errors $errors)
    {
        $errorMessage = [];
        foreach ($errors as $error) {
            $this->logger->writeLog('Ошибка в данных', $error);
            $errorMessage[]= $error->getMessage();
        }
        $this->view->errors = $errorMessage;
        $this->view->display(__DIR__ . '/../../templates/errors/errors.php');
    }

    /**
     * @param \Throwable $error
     * @return void
     */
    public function actionShowError(\Throwable $error)
    {
        $this->view->error = $error->getMessage();
        $this->logger->writeLog('Неопознанная ошибка', $error);
        $this->view->display(__DIR__ . '/../../templates/errors/error.php');
    }
}