<?php

namespace App\Models;

use App\Db;
use App\Error404;
use App\MagicTrait;

/**
 * Class Model
 * @package App\Models
 * @property int $id
 */
abstract class Model
{

    use MagicTrait;

    protected const TABLE = null;

    public $id;

    /**
     * @return array|bool
     */
    public static function findAll()
    {
        $db = Db::instance();
        $sql = 'SELECT * FROM ' . static::TABLE;
        $res = $db->query($sql, static::class);
        if (false === $res) {
            throw new Error404('Ошибка 404 - не найдено!');
        }
        return $res;
    }

    /**
     * @param int|null $id
     * @return object|bool
     */
    public static function findOneById(int $id = null)
    {
        $db = Db::instance();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $res = $db->query($sql, static::class, [':id' => $id]);
        if (empty($res)) {
            throw new Error404('Ошибка 404 - не найдено!');
        }
        return $res ? $res[0] : false;
    }

    /**
     * @param int $quantity
     * @return object|array
     */
    public static function findLatest(int $quantity = 1)
    {
        $db = Db::instance();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $quantity;
        return (1 === $quantity) ? $db->query($sql, static::class)[0] : $db->query($sql, static::class);
    }

    /**
     * @return void
     */
    public function insert()
    {
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

    /**
     * @return void
     */
    public function update()
    {
        $data = [];
        $columns = [];
        foreach ($this as $name => $value) {
            /*
            if ('data' == $name) {
                continue;
            }
            */
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

    /**
     * @return void
     */
    public function save()
    {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    /**
     * @return void
     */
    public function delete()
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = :id';
        $data = [':id' => $this->id];
        $db = Db::instance();
        $db->execute($sql, $data);
    }

    public function fill(array $data)
    {
        //$this->data =
    }

}