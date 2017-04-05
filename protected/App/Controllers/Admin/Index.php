<?php

namespace App\Controllers\Admin;

use App\Controller;

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
        $this->view->news = \App\Models\Article::findLatest($quantityNews);
        $this->view->display(__DIR__ . '/../../../../admin/templates/index.php');
    }

}