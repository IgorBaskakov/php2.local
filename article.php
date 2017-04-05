<?php

require_once __DIR__ . '/protected/autoload.php';
/*
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = null;
}
*/

$controller = new App\Controllers\Index;
$controller->action('One');
