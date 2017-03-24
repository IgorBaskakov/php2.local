<?php

use App\Models\HasPrice;

require_once __DIR__ . '/protected/autoload.php';

$article = new \App\Models\Article;
$article->title = 'Еще одна новость';
$article->lead = 'Здесь должно быть содержание новости';
//$article->id = 6;

//$article->insert();
$article->save();
//$article->delete();

$config = new \App\Config;
//echo $config->data['db']['host'];
//var_dump($config->data);