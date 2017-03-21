<?php

require_once __DIR__ . '/Models/Article.php';

$data = \Models\Article::findAll();

var_dump($data);
