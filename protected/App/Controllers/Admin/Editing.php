<?php

namespace App\Controllers\Admin;

use App\Components\CheckDataFromUser;
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
     * Editing constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->dataFromUser = new CheckDataFromUser;
    }

    /**
     * @return void
     */
    protected function actionInsert()
    {
        $checkedData = $this->dataFromUser->checkDataForEdit($_POST);
        if (false === $checkedData) {
            $article = new Article;
            $article->title = $_POST['title'];
            $article->lead = $_POST['lead'];
            $article->save();
        }
        $this->afterAction();
    }

    /**
     * @return void
     */
    protected function actionEdit()
    {
        $checkedData = $this->dataFromUser->checkDataForEdit($_POST);
        if (true === $checkedData) {
            $article = Article::findOneById((int)$_POST['id']);
            $article->title = $_POST['title'];
            $article->lead = $_POST['lead'];
            $article->save();
        }
        $this->afterAction();
    }

    /**
     * @return void
     */
    protected function actionDelete()
    {
        $checkedData = $this->dataFromUser->checkDataForDelete($_GET);
        if (true === $checkedData) {
            $article = Article::findOneById((int)$_GET['id']);
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