<?php
require_once __DIR__ . '/protected/autoload.php';

$quantityNews = 3;
$news = \Models\Article::getLastNews($quantityNews);

include __DIR__ . '/templates/index.php';