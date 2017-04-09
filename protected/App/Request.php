<?php

namespace App;

/**
 * Class Request
 * @package App
 */
class Request
{
    /** @var array Should contatin a data */
    protected $data = [];

    const ACTION = 'Default';
    const CONTROLLER = 'Index';
    /**
     * @param string $path
     * @return bool
     */
    public function isFile($path)
    {
        return is_file($path . '.php');
    }

    /**
     * @param string $req
     * @return array
     */
    public function parsing(string $req)
    {
        $parts = explode('/', $req);
        $pathDefault = '\\Controllers';
        if (empty($parts[0])) {
            array_shift($parts);
        }

        if ('?' === mb_substr($parts[count($parts) - 1], 0, 1)) {
            array_pop($parts);
        }

        $action = $parts[count($parts) - 1];
        array_pop($parts);

        if (!empty($parts[0]) && 'admin' === $parts[0]) {
            $pathDefault .= '\\Admin';
            array_shift($parts);
        }

        $path = $pathDefault;
        foreach ($parts as $part) {
            $path .= '\\' . $part;
        }

        if ($this->isFile(__DIR__ . $path)) {
            $this->data['ctrl'] = $path;
        } else {
            $this->data['ctrl'] = $pathDefault . '\\' . static::CONTROLLER;
        }

        if (!empty($action) && 'index.php' !== $action) {
            $this->data['act'] = $action;
        } else {
            $this->data['act'] = static::ACTION;
        }
        return $this->data;
    }

}