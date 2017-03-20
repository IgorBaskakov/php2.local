<?php

class Db
{

    protected $dbh;

    public function __construct()
    {
        $this->dbh = new PDO('mysql:host=localhost;dbname=php2', 'root', '');
    }

    public function query($sql)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute();
        if ($res) {
            return $sth->fetchAll();
        } else {
            return false;
        }
    }

}