<?php

spl_autoload_register(
    function (string $class)
    {
        require_once __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    }
);

/*
function __autoload($class)
{
    require __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
}
*/