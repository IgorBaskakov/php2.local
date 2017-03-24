<?php

namespace App\Models;

require_once __DIR__ . '/../../autoload.php';


class Article
    extends Model
{

    protected const TABLE = 'news';

    public $title;
    public $lead;

    public static function getLastNews($quantityNews)
    {
        $db = \App\Db::instance();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $quantityNews;
        return $db->query($sql, static::class);
    }

}