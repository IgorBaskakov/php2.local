<?php

namespace App;

/**
 * Class Errors
 * @package App
 */
class Errors extends \Exception implements \Iterator
{

    /** @var array Should contain a data */
    protected $data = [];

    /**
     * @param \Exception $e
     * @return void
     */
    public function add(\Exception $e)
    {
        $this->data[] = $e;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->data;
    }

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