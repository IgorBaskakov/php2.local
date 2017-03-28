<?php

require_once __DIR__ . '/../protected/autoload.php';

if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['lead'])) {
    $article = new \App\Models\Article();
    $article->id = $_POST['id'];
    $article->title = $_POST['title'];
    $article->lead = $_POST['lead'];
    $article->save();
}