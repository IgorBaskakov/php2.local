<?php

//use App\Models\HasPrice;

require_once __DIR__ . '/protected/autoload.php';

$article = new \App\Models\Article;
$article->title = 'Еще одна новость';
$article->lead = 'Здесь должно быть содержание новости';
//$article->id = 11;

//$article->insert();
//$article->update();
//$article->save();
//$article->delete();