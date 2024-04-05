<?php

namespace src\Classes\Exceptions;

use Exception;

class UserNotFoundException extends Exception
{
    public function __construct($message = "Usuario não foi encontrado" . PHP_EOL, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
