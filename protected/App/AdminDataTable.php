<?php

namespace App;


class AdminDataTable
{
    protected $models = [];
    protected $funcs = [];

    public function __construct(array $models, array $funcs)
    {
        $this->models = $models;
        $this->funcs = $funcs;
    }

    public function render()
    {
        $table = [];
        foreach ($this->models as $model) {
            foreach ($this->funcs as $name => $func) {
                $table[$model->id][$name] = $func($model);
            }
        }
        return $table;
    }

}