<?php

namespace Models;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=localhost;dbname=php2', 'root', '');
    }

    public function query($sql, string $class)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute();
        if ($res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        } else {
            return false;
        }
    }

}