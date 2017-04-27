<?php
use \App\Models\Article;

return [
    function (Article $model)
    {
        return $model->title;
    },
    function (Article $model)
    {
        return $model->lead;
    },
    function (Article $model)
    {
        return isset($model->author) ? $model->author->name : 'Неизвестный автор';
    },
    function (Article $model)
    {
        return '<a href="/admin/Index/Update/?id=' . $model->id . '">Изменить</a>';
    },
    function (Article $model)
    {
        return '<a href="/admin/Editing/Delete/?id=' . $model->id . '">Удалить</a>';
    },
];