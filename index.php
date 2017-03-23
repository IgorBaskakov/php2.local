<?php
require_once __DIR__ . '/autoload.php';

$quantityNews = 3;
$news = \PHP2\Models\Article::getLastNews($quantityNews);

include __DIR__ . '/templates/index.php';