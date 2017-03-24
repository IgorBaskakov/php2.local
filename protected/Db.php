<?php


class Db
{
    use Singleton;

    protected $dbh;

    protected function __construct()
    {
        $this->dbh = new \PDO('mysql:host=localhost;dbname=php2', 'root', '');
    }

    public function query(string $sql, string $class = \stdClass::class, array $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        if ($res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        } else {
            return false;
        }
    }

    public function execute(string $query, array $params = [])
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }
}
