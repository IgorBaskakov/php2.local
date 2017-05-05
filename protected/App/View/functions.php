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
    }
];