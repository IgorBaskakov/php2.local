<?php

require_once __DIR__ . '/protected/autoload.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = null;
}

$article = \App\Models\Article::findById($id);

include __DIR__ . '/templates/article.php';