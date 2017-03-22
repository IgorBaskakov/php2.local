<?php
require_once __DIR__ . '/PHP2/Models/Article.php';

$article = new \PHP2\Models\Article();
$news = $article->getNews(3);

include __DIR__ . '/templates/index.php';