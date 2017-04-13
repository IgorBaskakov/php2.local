<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Article;

/**
 * Class Index
 * @package App\Controllers\Admin
 */
class Index extends Controller
{

    /**
     * @return void
     */
    protected function actionDefault()
    {
        $quantityNews = 10;
        $this->view->news = Article::findLatest($quantityNews);
        $this->view->display(__DIR__ . '/../../../templates/admin/index.php');
    }

}