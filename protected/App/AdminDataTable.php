<?php

namespace App;
use App\View\ViewNative;

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
     * @return string
     */
    public function render($template)
    {
        $view = new ViewNative;
        $view->models = $this->models;
        $view->funcs = $this->funcs;

        ob_start();
        $view->display($template);
        return ob_get_clean();
    }

}