<?php

namespace App;

/**
 * Class FluentClass
 * @package App
 */
class FluentClass
{

    /** @var int Should contain a foo */
    /** @var int Should contain a bar */
    /** @var int Should contain a baz */
    protected $foo;
    protected $bar;
    protected $baz;

    /**
     * @param int $value
     * @return $this
     * @throws \Exception
     */
    public function setFoo(int $value)
    {
        if ($value <= 0) {
            throw new \Exception('Foo must be positive!');
        }
        $this->foo = $value;
        return $this;
    }

    /**
     * @param int $value
     * @return $this
     * @throws \Exception
     */
    public function setBar(int $value)
    {
        if ($value >= 0) {
            throw new \Exception('Bar must be negative!');
        }
        $this->bar = $value;
        return $this;
    }

    /**
     * @param int $value
     * @return $this
     * @throws \Exception
     */
    public function setBaz(int $value)
    {
        if ($value !== 0) {
            throw new \Exception('Baz must be null!');
        }
        $this->baz = $value;
        return $this;
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return [
            $this->foo,
            $this->bar,
            $this->baz,
        ];
    }

    /**
     * @param array $data
     * @throws Errors
     * @return void
     */
    public function fill(array $data)
    {
        $errors = new Errors;
        foreach ($data as $key => $val) {
            try {
                $method = 'set' . ucfirst($key);
                $this->$method($val);
            } catch (\Exception $e) {
                $errors->add($e);
            }
        }
        if (!empty($errors->getErrors())) {
            throw $errors;
        }
    }

}