<?php

namespace App;

/**
 * Class View
 * @package App
 *
 * @implements \Countable
 * @implements \Iterator
 */
class View implements
    \Countable,
    \Iterator
{
    use GetterSetter;

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
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->data);
    }

    /**
     * @return void
     */
    public function next()
    {
        next($this->data);
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return null !== key($this->data);
    }

    /**
     * @return void
     */
    public function rewind()
    {
        reset($this->data);
    }

}