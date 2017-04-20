<?php

namespace App\Controllers;
use App\Exceptions\E404Exception;
use App\View;

/**
 * Class Controller
 * @package App\Controllers
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
        $this->view = new View;
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
     * @throws \Exception
     * @return void
     */
    public function action($action)
    {
        if ($this->access($action)) {
            $action = 'action' . $action;
            $this->$action();
        } else {
            throw new \Exception('Доступ закрыт!');
        }
    }

    /**
     * @param $name
     * @param $arguments
     * @throws E404Exception
     * @return void
     */
    public function __call($name, $arguments)
    {
        throw new E404Exception('Страница не найдена');
    }

}