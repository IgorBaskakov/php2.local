<?php

require_once __DIR__ . '/protected/autoload.php';
/*
$quantityNews = 3;
$news = \App\Models\Article::findLatest($quantityNews);

include __DIR__ . '/templates/index.php';
*/

$view = new \App\View();

$view->articles = \App\Models\Article::findAll();
$view->foo = 'bar';
$view->baz = 42;

$view->display(__DIR__ . '/templates/test.php');
