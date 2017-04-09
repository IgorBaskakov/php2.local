<?php

namespace App;


use Throwable;

/**
 * Class Error404
 * @package App
 */
class Error404 extends \Exception
{

    use ErrorTrait;

    /**
     * Error404 constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->setMsg('Ошибка 404 - страница не найдена!');
    }

}