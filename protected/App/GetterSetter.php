<?php

namespace App;

/**
 * Trait GetterSetter
 * @package App
 */
trait GetterSetter
{
    /** @var array Should contain a data */
    protected $data;

    /**
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]) ?: false;
    }

}