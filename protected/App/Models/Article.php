<?php

namespace App\Models;

require_once __DIR__ . '/../../autoload.php';


class Article extends Model
{

    protected const TABLE = 'news';

    public $title;
    public $lead;

}