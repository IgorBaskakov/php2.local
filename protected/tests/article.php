<?php

require_once __DIR__ . '/../autoload.php';

$dataModel = \App\Models\Model::findAll();
$dataArticle = \App\Models\Article::findAll();

assert(false === $dataModel);
assert(true === is_array($dataArticle));