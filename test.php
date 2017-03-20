<?php

require __DIR__ . '/Db.php';

$db = new Db;
$data = $db->query('SELECT * FROM news');

var_dump($data);