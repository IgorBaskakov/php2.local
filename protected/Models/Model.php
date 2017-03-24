<?php

namespace Models;


abstract class Model
{
    protected const TABLE = null;

    public $id;

    public static function findAll()
    {
        $db = \Db::instance();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, static::class);
    }

    public static function findById(int $id = null)
    {
        $db = \Db::instance();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $res = $db->query($sql, static::class, [':id' => $id]);
        return ((false !== $res) && (0 !== count($res)))? $res[0] : false;
    }

    public function insert()
    {
        // @todo: изучить! var_dump(get_object_vars($this));
        $columns = [];
        $params = [];
        $data = [];
        foreach ($this as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $columns[] = $name;
            $params[] = ':' . $name;
            $data[':' . $name] = $value;
        }
        $sql = '
INSERT INTO ' . static::TABLE . ' (' . implode(', ', $columns) . ') 
VALUES (' . implode(', ', $params) . ')
        ';
        $db = \Db::instance();
        $db->execute($sql, $data);
    }
}