<?php
require_once __DIR__ . '/autoload.php';

$article = new \PHP2\Models\Article();
$quantityNews = 3;

$news = $article->getNews($quantityNews);

include __DIR__ . '/templates/index.php';