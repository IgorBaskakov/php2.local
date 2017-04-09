<?php

namespace App;


class Errors extends \Exception implements \Iterator
{

    protected $data = [];

    public function add(\Exception $e)
    {
        $this->data[] = $e;
    }

    public function getErrors()
    {
        return $this->data;
    }

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