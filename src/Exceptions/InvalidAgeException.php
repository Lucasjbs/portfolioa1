<?php

namespace Portifolio\Interaction\Exceptions;

use Exception;

class InvalidAgeException extends Exception
{
    public const CODE = 1002;

    public function __construct(string $message)
    {
        parent::__construct($message, 1002);
    }
}