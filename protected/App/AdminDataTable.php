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
        $i = 0;
        foreach ($this->models as $model) {
            foreach ($this->funcs as $func) {
                $table[$i][] = $func($model);
            }
            $i++;
        }
        return $table;
    }

}