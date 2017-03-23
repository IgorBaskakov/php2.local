<?php

namespace PHP2\Models;

abstract class Model
{
    protected const TABLE = null;

    public $id;

    public static function findAll()
    {
        $db = new \PHP2\Db;
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, static::class);
    }

    public static function findById(int $id = null)
    {
        $db = new \PHP2\Db;
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $res = $db->query($sql, static::class, [':id' => $id]);
        return ((false !== $res) && (0 !== count($res)))? $res[0] : false;
    }
}