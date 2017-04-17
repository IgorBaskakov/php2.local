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
        $data = Article::findAll();
        if (false === $data) {
            throw new \Exception('Отсутствуют ВСЕ данные');
        } else {
            $this->view->articles = $data;
            $this->view->displayWithTwig(__DIR__ . '/../../templates/default.php');
        }

    }

}