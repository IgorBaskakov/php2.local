<?php

namespace PHP2\Models;

require_once __DIR__ . '/../../autoload.php';


class Article
    extends Model
{

    protected const TABLE = 'news';

    public $title;
    public $lead;

    public static function getLastNews($quantityNews)
    {
        $db = new \PHP2\Db;
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $quantityNews;
        return $db->query($sql, static::class);
    }

}