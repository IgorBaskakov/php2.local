<?php

namespace App\Models;

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