<?php

namespace App\View;

use App\IteratorTrait;
use App\MagicTrait;

abstract class ViewAbstract implements
    \Countable,
    \Iterator

{
    use MagicTrait;
    use IteratorTrait;

    /**
     * @param string $template
     * @return void
     */
    public function display(string $template)
    {
        echo $this->render($template);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }

}