<?php

require_once __DIR__ . '/../autoload.php';

$dataModel = \Models\Model::findAll();
$dataArticle = \Models\Article::findAll();

assert(false === $dataModel);
assert(true === is_array($dataArticle));