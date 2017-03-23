<?php

require_once __DIR__ . '/../autoload.php';

$dataModel = \PHP2\Models\Model::findAll();
$dataArticle = \PHP2\Models\Article::findAll();

assert(false === $dataModel);
assert(true === is_array($dataArticle));