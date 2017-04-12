<?php

namespace App\Controllers;

/**
 * Class Errors
 * @package App\Controllers
 */
class Errors extends Controller
{

    /**
     * @param \Throwable $error
     * @return void
     */
    public function actionShowError(\Throwable $error)
    {
        $this->view->error = $error;
        $this->view->display(__DIR__ . '/../../templates/errors/error.php');
    }

    /**
     * @param \Exception $error
     * @return void
     */
    public function actionShowError404(\Exception $error)
    {
        $this->view->error = $error;
        $this->view->display(__DIR__ . '/../../templates/errors/error404.php');
    }

}