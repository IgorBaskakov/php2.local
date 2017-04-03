<?php

namespace App;

/**
 * Class Config
 * @package App
 * @property string $data
 */
class Config
{
    use Singleton;

    public $data;

    /**
     * Config constructor.
     */
    protected function __construct()
    {
        $this->data = include __DIR__ . '/../configData.php';
    }

}