<?php

require_once __DIR__ . '/../PHP2/Models/Model.php';
require_once __DIR__ . '/../PHP2/Models/Article.php';
require_once __DIR__ . '/../PHP2/Models/Db.php';

$dataModel = \PHP2\Models\Model::findAll();
$dataArticle = \PHP2\Models\Article::findAll();

assert(false === $dataModel);
assert(true === is_array($dataArticle));

//var_dump($dataArticle);
