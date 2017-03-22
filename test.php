<?php

require_once __DIR__ . '/PHP2/Models/Article.php';

//$data = \PHP2\Models\Article::findAll();
$data = \PHP2\Models\Article::findById(2);

var_dump($data);
