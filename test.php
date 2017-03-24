<?php

use Models\HasPrice;

require_once __DIR__ . '/protected/autoload.php';

$article = new \Models\Article;
$article->title = 'Новая новость';
$article->lead = 'Случилось нечто хорошее!';
$article->insert();