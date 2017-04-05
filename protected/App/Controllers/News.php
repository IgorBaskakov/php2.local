<?php

namespace App\Controllers;

use App\Controller;

class News extends Controller
{

    protected function actionOne()
    {
        $this->view->item = \App\Models\Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../../../templates/one.php');
    }

}