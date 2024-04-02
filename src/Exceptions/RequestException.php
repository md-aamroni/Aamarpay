<?php

namespace Aamroni\Aamarpay\Exceptions;

use Exception;

class RequestException extends Exception
{
    /**
     * The error message
     * @var string
     */
    protected $message = 'An error occurred during HTTP request';
}
