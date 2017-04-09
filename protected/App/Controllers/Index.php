<?php

namespace App\Controllers;

use App\Controller;

/**
 * Class Index
 * @package App\Controllers
 */
class Index extends Controller
{
    /**
     * @return void
     */
    protected function actionDefault()
    {
        $this->view->articles = \App\Models\Article::findAll();
        $this->view->display(__DIR__ . '/../../templates/default.php');
    }

}