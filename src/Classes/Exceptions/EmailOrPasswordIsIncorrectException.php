<?php

namespace src\Classes\Exceptions;

use Exception;

class EmailOrPasswordIsIncorrectException extends Exception
{
    public function __construct($message = "E-mail ou senha está incorreto" . PHP_EOL, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
