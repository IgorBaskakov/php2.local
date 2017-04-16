<?php

namespace App;

use App\Components\Config;

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
     * @throws ErrorDb
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
            throw new ErrorDb('Ошибка подключения к БД');
        }
    }

    /**
     * @param string $sql
     * @param string $class
     * @param array $params
     * @throws ErrorDb
     * @return array|bool
     */
    public function query(string $sql, string $class = \stdClass::class, array $params = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
            $res = $sth->execute($params);
            return (true === $res) ? $sth->fetchAll(\PDO::FETCH_CLASS, $class) : false;
        } catch (\PDOException $e) {
            throw new ErrorDb('Ошибка выполнения запроса с возвратом данных');
        }
    }

    /**
     * @param string $sql
     * @param array $params
     * @throws ErrorDb
     * @return bool
     */
    public function execute(string $sql, array $params = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
            return $sth->execute($params);
        } catch (\PDOException $e) {
            throw new ErrorDb('Ошибка выполнения запроса');
        }
    }

    /**
     * @throws ErrorDb
     * @return string
     */
    public function getLastInsertId()
    {
        try {
            return $this->dbh->lastInsertId();
        } catch (\PDOException $e) {
            throw new ErrorDb('Ошибка при попытке вернуть ID последней записи');
        }
    }

}
