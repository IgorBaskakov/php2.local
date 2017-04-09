<?php

namespace App;

/**
 * Class Logger
 * @package App
 */
class Logger
{

    use Singleton;

    const FILE = __DIR__ . '/../../logs/log.txt';

    /**
     * @param string $info
     * @param \Throwable $e
     * @return void
     */
    static public function WriteLog(string $info, \Throwable $e)
    {
        $time = date('Y-m-d H:i:s');
        $data = "\n" . $time . ' - [' . $info . ']: ' . $e->getMessage() . '.'
            . ' Ошибка в файле: ' . $e->getFile() . ' (строка ' . $e->getLine() .')';
        file_put_contents(static::FILE, $data, FILE_APPEND);
    }

}