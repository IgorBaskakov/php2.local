<?php

namespace PHP2\Models;

class Db
{

    protected $dbh;
    protected $sth;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=localhost;dbname=php2', 'root', '');
    }

    public function query(string $sql, string $class, array $params = [])
    {
        $res = $this->execute($sql, $params);
        if ($res) {
            return $this->sth->fetchAll(\PDO::FETCH_CLASS, $class);
        } else {
            return false;
        }
    }

    public function execute($query, $params = [])
    {
        $this->sth = $this->dbh->prepare($query);
        return $this->sth->execute($params);
    }

}