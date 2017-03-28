<?php

use App\Models\HasPrice;

require_once __DIR__ . '/protected/autoload.php';
/*
$article = new \App\Models\Article;
$article->title = 'Еще одна новость';
$article->lead = 'Здесь должно быть содержание новости';
//$article->id = 11;

//$article->insert();
//$article->update();
$article->save();
//$article->delete();
*/

$json = '{"100308":1}';
$temp = json_decode($json);
$sub = get_object_vars($temp); // Error Array
var_dump($sub, array_key_exists('100308', $sub));