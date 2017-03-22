<?php

namespace PHP2\Models;

require_once __DIR__ . '/Db.php';
require_once __DIR__ . '/Model.php';



class Article
    extends Model
{

    protected const TABLE = 'news';

    public $title;
    public $lead;

    public function getNews($countNews)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $countNews;
        return $db->query($sql, static::class);
    }

}