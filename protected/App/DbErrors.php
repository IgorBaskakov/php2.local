<?php

namespace App;


class DbErrors extends \PDOException
{

    protected $msg = 'Подождите немного и мы все исправим! :)';

    public function showMsg()
    {
        return $this->msg;
    }

}