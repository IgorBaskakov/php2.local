<?php
require_once __DIR__ . '/../protected/autoload.php';

$quantityNews = 10;
$news = \App\Models\Article::findLatest($quantityNews);

include __DIR__ . '/templates/index.php';