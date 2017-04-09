<?php

spl_autoload_register(
    function (string $class)
    {
        $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
        if (is_file($file)) {
            require_once $file;
        } else {
            throw new Exception('отсутствует файл с классом: ' . $class);
        }
    }
);