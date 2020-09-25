<?php

namespace App\Exceptions;

use Throwable;

class InvalidVinException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->message = $message ?: 'Invalid VIN code was provided';
    }
}
