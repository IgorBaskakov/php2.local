<?php

namespace Models;

class Tyre
    extends Model
    implements HasPrice
{
    public $size;
    public $price;

    public function getPrice()
    {
        return 42;
    }
}