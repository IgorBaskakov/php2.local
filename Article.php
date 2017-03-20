<?php

require_once __DIR__ . '/Db.php';

class Article
{
    public $id;
    public $title;
    public $lead;

    public function findAll()
    {
        $db = new Db;
        return $db->query('SELECT * FROM news', self::class);
    }
}