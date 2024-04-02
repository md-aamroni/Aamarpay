<?php

namespace Aamroni\Aamarpay\Exceptions;

use Exception;

class PaymentException extends Exception
{
    /**
     * The error message
     * @var string
     */
    protected $message = 'An error occurred during aamarpay payment';
}
