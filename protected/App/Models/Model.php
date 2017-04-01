<?php

namespace App\Models;

use App\Db;

abstract class Model
{
    protected const TABLE = null;

    public $id;

    public static function findAll()
    {
        $db = Db::instance();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, static::class);
    }

    public static function findById(int $id = null)
    {
        $db = Db::instance();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $res = $db->query($sql, static::class, [':id' => $id]);
        return ((false !== $res) && (0 !== count($res)))? $res[0] : false;
    }

    public static function findLatest(int $quantity = 1)
    {
        $db = Db::instance();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $quantity;
        return (1 === $quantity) ? $db->query($sql, static::class)[0] : $db->query($sql, static::class);
    }

    public function insert()
    {
        // get_object_vars($this) - вернет ассоциативный массив свойств объекта.
        // Это лишнее действие, т.к. foreach можно применить к текущему объекту.
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
        $db = Db::instance();
        $db->execute($sql, $data);
        $this->id = (int)$db->getLastInsertId();
    }

    public function update()
    {
        $data = [];
        $columns = [];
        foreach ($this as $name => $value) {
            $data[':' . $name] = $value;
            if ('id' == $name) {
                 continue;
            }
            $columns[] = $name .  ' = :' . $name;
        }
        $sql = '
UPDATE ' . static::TABLE . ' 
SET ' . implode(', ', $columns) . ' 
WHERE id = :id
        ';
        $db = Db::instance();
        $db->execute($sql, $data);
    }

    public function save()
    {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = :id';
        $data = [':id' => $this->id];
        $db = Db::instance();
        $db->execute($sql, $data);
    }
}