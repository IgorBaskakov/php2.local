<?php

namespace App\Controllers;


use App\Controllers\Controller;
use App\DbErrors;
use App\Error404;

class Errors extends Controller
{

    public function actionShowErrorDb(DbErrors $error)
    {
        $this->view->error = $error;
        $this->view->display(__DIR__ . '/../../templates/errors/errorsDb.php');
    }

    public function actionShowError404(Error404 $error)
    {
        $this->view->error = $error;
        $this->view->display(__DIR__ . '/../../templates/errors/error404.php');
    }

    public function actionShowOtherErrors(\Throwable $error)
    {
        $this->view->error = $error;
        $this->view->display(__DIR__ . '/../../templates/errors/otherErrors.php');
    }

    public function actionShowErrorNewData(\App\Errors $errors)
    {
        $this->view->errors = $errors;
        $this->view->display(__DIR__ . '/../../templates/errors/errorInsertData.php');
    }

}