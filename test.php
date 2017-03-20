<?php

require_once __DIR__ . '/Article.php';

$data = Article::findAll();

var_dump($data);
