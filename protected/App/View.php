<?php

namespace App;

/**
 * Class View
 *
 * @property array $articles
 */
class View implements \Countable
{
    use GetterSetter;

    protected $data;

    public function render($template)
    {
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display($template)
    {
        echo $this->render($template);
    }

    public function count()
    {
        return count($this->data);
    }

}