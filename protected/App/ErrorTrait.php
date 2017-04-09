<?php

namespace App;

/**
 * Trait ErrorTrait
 * @package App
 */
trait ErrorTrait
{
    /** @var string Should contain a msg */
    protected $msg;

    /**
     * @return string
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * @param string $msg
     * @return void
     */
    public function setMsg(string $msg)
    {
        $this->msg = $msg;
    }

}