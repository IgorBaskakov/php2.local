<?php

namespace App\Controllers;

use App\Controller;

/**
 * Class News
 * @package App\Controllers
 */
class News extends Controller
{
    /**
     * @return void
     */
    protected function actionOne()
    {
        $this->view->item = \App\Models\Article::findOneById($_GET['id'] ?? null);
        if (false !== $this->view->item) {
            $this->view->display(__DIR__ . '/../../../templates/one.php');
        } else {
            $this->view->message = 'Ошибка 404! Страница не найдена!';
            $this->view->display(__DIR__ . '/../../../templates/error.php');
        }
    }

}