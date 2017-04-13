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
        $this->view->error = $error->getMessage();
        $this->view->displayWithTwig(__DIR__ . '/../../templates/errors/error.php');
    }

    /**
     * @param \Exception $error
     * @return void
     */
    public function actionShowError404(\Exception $error)
    {
        $this->view->error = $error->getMessage();
        header("HTTP/1.0 404 Not Found");
        //$this->view->displayWithTwig(__DIR__ . '/../../templates/errors/error404.php');
    }

    /**
     * @param array $errors
     * @return void
     */
    public function actionShowAllErrors($errors)
    {
        $ErrorMessage = [];
        foreach ($errors as $error) {
            $ErrorMessage[]= $error->getMessage();
        }
        $this->view->errors = $ErrorMessage;
        $this->view->displayWithTwig(__DIR__ . '/../../templates/errors/errors.php');
    }

}