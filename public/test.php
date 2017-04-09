<?php

require_once __DIR__ . '/protected/autoload.php';

/*
$ex = new Exception('Some happens!', 12);

var_dump( $ex->getCode() );
*/


try {

    $obj = new \App\FluentClass;
    $obj->fill([
        'foo' => 1,
        'bar' => -1,
        'baz' => 0
    ]);

} catch (\App\Errors $errors) {
    foreach ($errors as $error) {
        echo $error->getMessage();
    }
}

var_dump( $obj->getValues() );


/*
try {

    $obj = new \App\Models\Article;
    $obj->fill([
        41 => 'Новость 1',
        'lead' => 'Содержание новости',
        'name' => 'Пупкин Василий'
    ]);

} catch (\App\Errors $errors) {
    foreach ($errors as $error) {
        var_dump( $error->getMessage() );
        \App\Logger::WriteLog('Ошибка с данными', $error);
    }
}
*/
