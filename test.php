<?php

require_once __DIR__ . '/autoload.php';

//$data = \PHP2\Models\Article::findAll();
$data = \PHP2\Models\Article::findById(2);

var_dump($data);
