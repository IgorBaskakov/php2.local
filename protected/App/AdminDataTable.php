<?php

namespace App;

/**
 * Class AdminDataTable
 * @package App
 */
class AdminDataTable
{
    /** @var array Should contain a models */
    protected $models = [];
    /** @var array Should contain a funcs */
    protected $funcs = [];

    /**
     * AdminDataTable constructor.
     * @param array $models
     * @param array $funcs
     */
    public function __construct(array $models, array $funcs)
    {
        $this->models = $models;
        $this->funcs = $funcs;
    }

    /**
     * @return array
     */
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