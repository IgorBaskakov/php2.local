<?php

namespace App\Components;

use App\Singleton;

/**
 * Class Config
 * @package App\Components
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
        $this->data = include __DIR__ . '/../../configData.php';
    }

}