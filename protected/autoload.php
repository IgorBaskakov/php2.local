<?php

spl_autoload_register(
    function (string $class)
    {
        if (0 === strpos($class, 'App\\')) {
            require_once __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
        }
    }
);