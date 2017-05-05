<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Article;
use App\View\ViewNative;

/**
 * Class Index
 * @package App\Controllers\Admin
 */
class Index extends Controller
{

    /**
     * Index constructor.
     */
    public function __construct()
    {
        $this->view = new ViewNative;
    }

    /**
     * @return void
     */
    protected function actionDefault()
    {
        $quantityNews = 10;

        $this->view->articles =  Article::findLatest($quantityNews);
        $this->view->display(__DIR__ . '/../../../templates/admin/default.php');
    }

    protected function actionCreate()
    {
        $this->view->data = null;
        $this->view->display(__DIR__ . '/../../../templates/admin/create.php');
    }

    protected function actionUpdate()
    {
        $this->view->article = Article::findOneById((int)$_GET['id']);
        $this->view->display(__DIR__ . '/../../../templates/admin/update.php');
    }
}