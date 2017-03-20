<?php

require_once __DIR__ . '/Article.php';

$article = new Article;
$data = $article->findAll();

var_dump($data);