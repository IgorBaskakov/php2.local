<?php

namespace App;


use Throwable;

/**
 * Class DbErrors
 * @package App
 */
class DbErrors extends \PDOException
{

    use ErrorTrait;

    /**
     * DbErrors constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->setMsg('Ошибка в работе с БД!');
    }

}