<?php

namespace App;

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
     * @param string $path
     * @param string $templateName
     * @return void
     */
    public function displayWithTwig(string $path, string $templateName)
    {
        $loader = new \Twig_Loader_Filesystem($path);
        $envt = new \Twig_Environment($loader);
        echo $envt->render($templateName, $this->data);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }


}