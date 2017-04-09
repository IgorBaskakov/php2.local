<?php

namespace App;

/**
 * Class Controller
 * @package App
 */
abstract class Controller
{

    /** @var object Should contatin a view */
    protected $view;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->view = new \App\View;
    }

    /**
     * @param $action
     * @return bool
     */
    protected function access($action)
    {
        return true;
    }

    /**
     * @param string $action
     * @return void
     */
    public function action($action)
    {
        if ($this->access($action)) {
            $action = 'action' . $action;
            $this->$action();
        } else {
            die('Доступ закрыт!');
        }
    }

    /**
     * @param $name
     * @param $arguments
     * @throws Error404
     * @return void
     */
    public function __call($name, $arguments)
    {
        throw new Error404('Ошибка 404! Страница не найдена!');
    }

}