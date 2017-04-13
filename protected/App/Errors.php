<?php

namespace App;

/**
 * Class Errors
 * @package App
 */
class Errors extends \Exception implements \Iterator
{
    use IteratorTrait;

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

}