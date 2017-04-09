<?php

namespace App\Controllers;


use App\Controller;
use App\DbErrors;
use App\Error404;

class Errors extends Controller
{

    public function actionShowErrorDb(DbErrors $error)
    {
        $this->view->error = $error;
        $this->view->display(__DIR__ . '/../../../templates/errorsDb.php');
    }

    public function actionShowError404(Error404 $error)
    {
        $this->view->error = $error;
        $this->view->display(__DIR__ . '/../../../templates/error404.php');
    }

    public function actionShowOtherErrors(\Throwable $error)
    {
        $this->view->error = $error;
        $this->view->display(__DIR__ . '/../../../templates/otherErrors.php');
    }

}