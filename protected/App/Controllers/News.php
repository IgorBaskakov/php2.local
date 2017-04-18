<?php

namespace App\Controllers;

use App\Exceptions\E404Exception;
use App\Models\Article;

/**
 * Class News
 * @package App\Controllers
 */
class News extends Controller
{
    /**
     * @throws E404Exception
     * @return void
     */
    protected function actionOne()
    {
        $item = Article::findOneById($_GET['id'] ?? null);

        if (empty($item)) {
            throw new E404Exception('data not found');
        }

        $this->view->item = $item;
        $this->view->displayWithTwig(__DIR__ . '/../../templates/one.php');
    }

}