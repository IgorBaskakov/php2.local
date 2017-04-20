<?php

namespace App\View;

/**
 * Class ViewNative
 * @package App
 * @implements \Countable
 * @implements \Iterator
 */
class ViewTwig extends ViewAbstract
{

    /**
     * @param string $template
     * @return string
     */
    public function render(string $template)
    {
        $parts = $this->parseTemplate($template);
        $loader = new \Twig_Loader_Filesystem($parts['path']);
        $envt = new \Twig_Environment($loader);
        return $envt->render($parts['fileName'], $this->data);
    }

    /**
     * @param string $template
     * @return array
     */
    protected function parseTemplate(string $template)
    {
        $str = str_replace('\\', '/', $template);
        $parts = explode('/', $str);
        $fileNameTemplate = array_pop($parts);
        $pathToTemplates = implode('/', $parts);
        return ['fileName' => $fileNameTemplate, 'path' => $pathToTemplates];
    }

}