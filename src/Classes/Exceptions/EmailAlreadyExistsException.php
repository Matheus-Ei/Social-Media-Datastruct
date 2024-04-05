<?php

namespace src\Classes\Exceptions;

use Exception;

class EmailAlreadyExistsException extends Exception
{
    public function __construct($message = "E-mail já está em uso" . PHP_EOL, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
