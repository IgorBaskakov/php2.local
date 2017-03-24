<?php

namespace App\Models;

class Disc
    extends Model
    implements HasPrice
{
    public $size;
    public $price;

    public function getPrice()
    {
        return 18;
    }
}