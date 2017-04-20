<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Article;

/**
 * Class Editing
 * @package App\Controllers\Admin
 */
class Editing extends Controller
{

    /** @var object Should contatin a dataFromUser */
    protected $dataFromUser;

    /**
     * @return void
     */
    protected function actionInsert()
    {
        $article = new Article;
        $article->fill([
            'title' => $_POST['title'],
            'lead' => $_POST['lead']
        ]);
        $article->save();

        $this->afterAction();
    }

    /**
     * @return void
     */
    protected function actionEdit()
    {
        $article = Article::findOneById((int)$_GET['id']);
        $article->fill([
            'title' => $_POST['title'],
            'lead' => $_POST['lead']
        ]);
        $article->save();

        $this->afterAction();
    }

    /**
     * @return void
     */
    protected function actionDelete()
    {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $article = Article::findOneById($id);
            $article->delete();
        }

        $this->afterAction();
    }

    /**
     * @return void
     */
    protected function afterAction()
    {
        header('Location: /admin/Index/Default');
    }

}