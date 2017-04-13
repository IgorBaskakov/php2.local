<?php

namespace App;

use App\Components\Twig;

/**
 * Class View
 * @package App
 * @implements \Countable
 * @implements \Iterator
 */
class View implements
    \Countable,
    \Iterator
{
    use MagicTrait;
    use IteratorTrait;

    /** @var array Should contain a data */
    protected $data;

    /**
     * @param string $template
     * @return string
     */
    public function render(string $template)
    {
        ob_start();
        foreach ($this as $key => $val) {
            $$key = $val;
        }
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    /**
     * @param string $template
     * @return void
     */
    public function display(string $template)
    {
        echo $this->render($template);
    }

    /**
     * @param string $template
     * @return void
     */
    public function displayWithTwig(string $template)
    {
        $twig = new Twig($template, $this->data);
        echo $twig->render();
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }

}