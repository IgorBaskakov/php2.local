<?php

namespace App;

require_once __DIR__ . '/../autoload.php';

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
     */
    protected function __construct()
    {
        $config = Config::instance();
        $data = $config->data['db'];
        $this->dbh = new \PDO(
            'mysql:host=' . $data['host'] . ';dbname=' . $data['dbname'],
            $data['login'],
            $data['password']
        );
        $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @param string $sql
     * @param string $class
     * @param array $params
     * @return array|bool
     */
    public function query(string $sql, string $class = \stdClass::class, array $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        return (true === $res) ? $sth->fetchAll(\PDO::FETCH_CLASS, $class) : false;
    }

    /**
     * @param string $sql
     * @param array $params
     * @return bool
     */
    public function execute(string $sql, array $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    /**
     * @return string
     */
    public function getLastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}
