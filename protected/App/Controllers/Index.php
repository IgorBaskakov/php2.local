<?php

namespace App\Controllers;

use App\Models\Article;

/**
 * Class Index
 * @package App\Controllers
 */
class Index extends Controller
{
    /**
     * @return void
     * @throws \Exception
     */
    protected function actionDefault()
    {
        $this->view->articles = Article::findAll();
        if (false === $this->view->articles) {
            throw new \Exception('Отсутствуют ВСЕ данные');
        }
        $this->view->displayWithTwig(__DIR__ . '/../../templates/default.php');
    }

}