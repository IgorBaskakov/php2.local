<?php

namespace App\Components;

class Twig
{

    protected $envt;
    protected $fileTemplate;
    protected $data;

    public function __construct(string $template, $data)
    {
        $res = $this->parseTemplate($template);
        $this->fileTemplate = $res['file'];

        $loader = new \Twig_Loader_Filesystem($res['path']);
        $this->envt = new \Twig_Environment($loader);
        $this->data = $data;
    }

    protected function parseTemplate(string $template)
    {
        $str = str_replace('\\', '/', $template);
        $parts = explode('/', $str);

        $fileNameTemplate = array_pop($parts);
        $pathToTemplates = implode('/', $parts);

        return ['file' => $fileNameTemplate, 'path' => $pathToTemplates];
    }

    public function render()
    {
        echo $this->envt->render($this->fileTemplate, $this->data);
    }

}