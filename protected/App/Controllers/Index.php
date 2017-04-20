<?php

namespace App\Controllers;

use App\Exceptions\E404Exception;
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
        $articles = Article::findAll();

        if (false === $articles) {
            throw new E404Exception('data not found');
        }

        $this->view->articles = $articles;
        $this->view->display(__DIR__ . '/../../templates/default.php');
    }

}