<?php

namespace Portifolio\Interaction\Exceptions;

use Exception;

class InvalidIdException extends Exception
{
    public const CODE = 1000;

    public function __construct(string $message)
    {
        parent::__construct($message, 1000);
    }
}