<?php

require_once __DIR__ . '/../protected/autoload.php';

if (isset($_POST['id'])) {
    $article = new \App\Models\Article();
    $article->id = $_POST['id'];
    $article->delete();
}

