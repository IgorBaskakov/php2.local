<?php

namespace App\Controllers\Admin;

use App\AdminDataTable;
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

        $articles = Article::findLatest($quantityNews);

        $funcs = [
            'drawForm' => function ($model)
                {
                    $this->view->article = $model;
                    return $this->view->render(__DIR__ . '/../../../templates/admin/form.php');
                },
            'drawBtnDelete' => function ($model)
                {
                    $this->view->article = $model;
                    return $this->view->render(__DIR__ . '/../../../templates/admin/btnDelete.php');
                }
        ];

        $adminDataTable = new AdminDataTable($articles, $funcs);
        $this->view->table = $adminDataTable->render();

        $this->view->display(__DIR__ . '/../../../templates/admin/index.php');
    }

}