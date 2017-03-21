<?php

namespace PHP2\Models;

abstract class Model
{
    protected const TABLE = null;

    public $id;

    public static function findAll()
    {
        $db = new \PHP2\Models\Db;
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, static::class);
    }

    public static function findById($id)
    {
        $db = new \PHP2\Models\Db;
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        return $db->query($sql, static::class, [':id' => $id])?:false;
    }
}