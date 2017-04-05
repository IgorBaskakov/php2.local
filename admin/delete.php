<?php

require_once __DIR__ . '/../protected/autoload.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $article = \App\Models\Article::findById($id);
    $article->delete();
}

header('Location: /admin/default.php');

