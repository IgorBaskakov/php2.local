<?php
require_once __DIR__ . '/../protected/autoload.php';

if (isset($_POST['insert'])) {
    include_once __DIR__ . '/insert.php';
} elseif (isset($_POST['update'])) {
    include_once __DIR__ . '/update.php';
} elseif (isset($_POST['delete'])) {
    include_once __DIR__ . '/delete.php';
}

$quantityNews = 10;
$news = \App\Models\Article::findLatest($quantityNews);

include __DIR__ . '/templates/index.php';