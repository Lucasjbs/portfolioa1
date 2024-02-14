<?php

namespace Portifolio\Interaction\Exceptions;

use Exception;

class InvalidPhoneException extends Exception
{
    public const CODE = 1003;

    public function __construct(string $message)
    {
        parent::__construct($message, 1002);
    }
}