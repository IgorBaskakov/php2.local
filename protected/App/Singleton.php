<?php

namespace App;

/**
 * Trait Singleton
 * @package App
 */
trait Singleton
{
    /** @var null|object Should contain an instance */
    protected static $instance = null;

    /**
     * Singleton constructor.
     */
    protected function __construct()
    {
    }

    /**
     * @return object
     */
    public static function instance()
    {
        if (null === static::$instance) {
            static::$instance = new static;
        }
        return static::$instance;
    }

}