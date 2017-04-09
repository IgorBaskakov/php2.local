<?php

namespace App;


class FluentClass
{

    protected $foo;
    protected $bar;
    protected $baz;

    public function setFoo($value)
    {
        if ($value <= 0) {
            throw new \Exception('Foo must be positive!');
        }
        $this->foo = $value;
        return $this;
    }


    public function setBar($value)
    {
        if ($value >= 0) {
            throw new \Exception('Bar must be negative!');
        }
        $this->bar = $value;
        return $this;
    }


    public function setBaz($value)
    {
        if ($value !== 0) {
            throw new \Exception('Baz must be null!');
        }
        $this->baz = $value;
        return $this;
    }

    public function getValues()
    {
        return [
            $this->foo,
            $this->bar,
            $this->baz,
        ];
    }

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