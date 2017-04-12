<?php

namespace App\Components;

use App\Singleton;

/**
 * Class Logger
 * @package App\Components
 */
class Logger
{

    use Singleton;

    /** @var string Should contatin a logFile */
    protected $logFile;

    /**
     * Logger constructor.
     */
    protected function __construct()
    {
        $config = Config::instance();
        $this->logFile = $config->data['log']['path'] .  $config->data['log']['filename'];

        if (!is_dir($config->data['log']['path'])) {
            mkdir($config->data['log']['path']);
        }
    }

    /**
     * @param string $info
     * @param \Throwable $e
     * @return void
     */
    public function writeLog(string $info, \Throwable $e)
    {
        $time = date('Y-m-d H:i:s');
        $data = "\n" . $time . ' - [' . $info . ']: ' . $e->getMessage() . '.'
            . ' Ошибка в файле: ' . $e->getFile() . ' (строка ' . $e->getLine() .')';
        file_put_contents($this->logFile, $data, FILE_APPEND);
    }

}