<?php

require_once __DIR__ . '/protected/autoload.php';

$quantityNews = 3;


$view = new \App\View();
$view->articles = \App\Models\Article::findAll();
$view->foo = 'bar';
$view->baz = 42;

//$view->display(__DIR__ . '/templates/test.php');
$view->display(__DIR__ . '/templates/index.php');