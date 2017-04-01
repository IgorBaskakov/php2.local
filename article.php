<?php

require_once __DIR__ . '/protected/autoload.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = null;
}

$view = new \App\View;
$view->article = \App\Models\Article::findById($id);
$view->display(__DIR__ . '/templates/article.php');
