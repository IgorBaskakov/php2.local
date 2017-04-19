<?php

namespace App;

use App\Components\Config;
use App\Exceptions\DbException;

/**
 * Class Db
 * @package App
 */
class Db
{
    use Singleton;

    /** @var \PDO Should contatin a dbh */
    protected $dbh;

    /**
     * Db constructor.
     * @throws DbException
     */
    protected function __construct()
    {
        $config = Config::instance();
        $data = $config->data['db'];

        try {
            $this->dbh = new \PDO(
                'mysql:host=' . $data['host'] . ';dbname=' . $data['dbname'],
                $data['login'],
                $data['password']
            );
            $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new DbException($e->getMessage());
        }
    }

    /**
     * @param string $sql
     * @param string $class
     * @param array $params
     * @throws DbException
     * @return array|bool
     */
    public function query(string $sql, string $class = \stdClass::class, array $params = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
            $res = $sth->execute($params);
            return (true === $res) ? $sth->fetchAll(\PDO::FETCH_CLASS, $class) : false;
        } catch (\PDOException $e) {
            throw new DbException('Query error');
        }
    }

    /**
     * @param string $sql
     * @param string $class
     * @param array $params
     * @throws DbException
     * @return array|bool
     */
    public function queryEach(string $sql, string $class = \stdClass::class, array $params = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
            $sth->setFetchMode(\PDO::FETCH_CLASS, $class);
            $res = $sth->execute($params);

            while (true === $res) {
                $data = $sth->fetch();
                if ($data instanceof $class) {
                    yield $data;
                } else {
                    $res = false;
                }
            }
            return false;
            //return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
            //return (true === $res) ? $sth->fetch() : false;
        } catch (\PDOException $e) {
            throw new DbException('Query error');
        }
    }

    /**
     * @param string $sql
     * @param array $params
     * @throws DbException
     * @return bool
     */
    public function execute(string $sql, array $params = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
            return $sth->execute($params);
        } catch (\PDOException $e) {
            throw new DbException('Ошибка выполнения запроса');
        }
    }

    /**
     * @throws DbException
     * @return string
     */
    public function getLastInsertId()
    {
        try {
            return $this->dbh->lastInsertId();
        } catch (\PDOException $e) {
            throw new DbException('Ошибка при попытке вернуть ID последней записи');
        }
    }

}
