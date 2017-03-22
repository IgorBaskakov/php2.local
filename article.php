<?php
require_once __DIR__ . '/PHP2/Models/Article.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = null;
}

$article = \PHP2\Models\Article::findById($id);

include __DIR__ . '/templates/article.php';