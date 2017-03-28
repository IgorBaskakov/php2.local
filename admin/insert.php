<?php

require_once __DIR__ . '/../protected/autoload.php';

if (isset($_POST['title']) && isset($_POST['lead']) && !isset($_POST['id'])) {
    $article = new \App\Models\Article();
    $article->title = $_POST['title'];
    $article->lead = $_POST['lead'];
    $article->save();
}