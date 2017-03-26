<?php
require_once __DIR__ . '/../protected/autoload.php';

$article = new \App\Models\Article();
$article->id = null;

if (isset($_POST['id'])) {
    $article->id = $_POST['id'];
}
if (isset($_POST['add']) || isset($_POST['edit'])) {
    $article->title = $_POST['title'];
    $article->lead = $_POST['lead'];
    $article->save();
} elseif (isset($_POST['delete'])) {
    $article->delete();
}

$quantityNews = 10;
$news = \App\Models\Article::findLatest($quantityNews);

include __DIR__ . '/templates/index.php';