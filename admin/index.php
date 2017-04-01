<?php
require_once __DIR__ . '/../protected/autoload.php';

$quantityNews = 10;

$view = new \App\View;
$view->news = \App\Models\Article::findLatest($quantityNews);
$view->display(__DIR__ . '/templates/index.php');