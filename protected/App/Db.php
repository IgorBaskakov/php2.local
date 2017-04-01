<?php

namespace App;

class Db
{
    use Singleton;

    protected $dbh;

    protected function __construct()
    {
        $config = Config::instance();
        $data = $config->data['db'];
        $this->dbh = new \PDO(
            'mysql:host=' . $data['host'] . ';dbname=' . $data['dbname'],
            $data['login'],
            $data['password']
        );
    }

    public function query(string $sql, string $class = \stdClass::class, array $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        return (true === $res) ? $sth->fetchAll(\PDO::FETCH_CLASS, $class) : false;
    }

    public function execute(string $sql, array $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function getLastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}
