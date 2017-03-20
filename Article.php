<?php

require_once __DIR__ . '/Db.php';
require_once __DIR__ . '/Model.php';

class Article
    extends Model
{

    protected const TABLE = 'news';

    public $title;
    public $lead;

}