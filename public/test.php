<?php

require_once __DIR__ . '/../protected/autoload.php';

/*
function ($x)
{
    return $x * 2;
};

$m3 = function ($x)
{
    return $x * 3;
};

function apply($x, callable $func)
{
    //var_dump($func);
    return $func($x);
}

echo apply(2, $m3);
*/

$loader = new Twig_Loader_Array(['index' => 'Hello {{ name }}!']);
$twig = new Twig_Environment($loader);
echo $twig->render('index', ['name' => 'Igor Baskakov']);

$loader = new Twig_Loader_Filesystem(__DIR__ . '/../protected/templates');
$twig = new Twig_Environment($loader, ['cache' => 'cache']);
echo $twig->render('index.html', ['name' => 'Igor Baskakov']);
