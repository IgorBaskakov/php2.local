<?php

namespace Models;

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