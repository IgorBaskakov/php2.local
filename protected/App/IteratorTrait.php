<?php

namespace App;

/**
 * Trait IteratorTrait
 * @package App
 */
trait IteratorTrait
{

    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->data);
    }

    /**
     * @return void
     */
    public function next()
    {
        next($this->data);
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return null !== key($this->data);
    }

    /**
     * @return void
     */
    public function rewind()
    {
        reset($this->data);
    }

}