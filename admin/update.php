<?php

require_once __DIR__ . '/../protected/autoload.php';

if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['lead'])) {
    $id = (int)$_POST['id'];
    $article = \App\Models\Article::findById($id);
    $article->title = $_POST['title'];
    $article->lead = $_POST['lead'];
    $article->save();
}

header('Location: /admin/index.php');