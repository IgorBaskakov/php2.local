<?php

trait Singleton
{
    protected static $instance = null;

    protected function __construct()
    {
    }

    public static function instance()
    {
        if (null === static::$instance) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

}