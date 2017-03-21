<?php

require_once __DIR__ . '/../PHP2/Models/Db.php';
require_once __DIR__ . '/../PHP2/Models/Article.php';

$db = new \PHP2\Models\Db;

$data1 = $db->query('SELECT title FROM news', \PHP2\Models\Article::class);
$data2 = $db->query('SELECT titl FROM news', \PHP2\Models\Article::class);

$res1 = $db->execute('
    UPDATE news SET title=:title WHERE id=:id',
    [':id' => 1, ':title' => 'У Марса обнаружили исчезающие спутники']
);

$res2 = $db->execute('
    UPDATE news1 SET title=:title WHERE id=:id',
    [':id' => 1, ':title' => 'У Марса обнаружили исчезающие спутники']
);


assert(true === is_object($db));
assert(true === is_array($data1));
assert(false === $data2);
assert(true === is_object($data1[0]));
assert(true === $res1);
assert(false === $res2);


