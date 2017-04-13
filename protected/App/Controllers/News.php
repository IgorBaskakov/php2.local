<?php

namespace App\Controllers;

use App\Error404;
use App\Models\Article;

/**
 * Class News
 * @package App\Controllers
 */
class News extends Controller
{
    /**
     * @throws Error404
     * @return void
     */
    protected function actionOne()
    {
        $this->view->item = Article::findOneById($_GET['id'] ?? null);
        if (false === $this->view->item) {
            throw new Error404('Данные не найдены');
        } else {
            $this->view->displayWithTwig(__DIR__ . '/../../templates/one.php');
        }
    }

}