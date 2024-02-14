<?php

namespace Portifolio\Interaction\Exceptions;

use Exception;

class InvalidNameException extends Exception
{
    public const CODE = 1001;

    public function __construct(string $message)
    {
        parent::__construct($message, 1001);
    }
}