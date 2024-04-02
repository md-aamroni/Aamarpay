<?php

namespace Aamroni\Aamarpay\Adapters;

use Aamroni\Aamarpay\Interfaces\PaymentInterface;

abstract readonly class PaymentAdapter extends ForFendAdapter implements PaymentInterface
{
    /**
     * Create a new PayPal instance
     * @return void
     */
    final public function __construct()
    {
        // TODO: Your Code Here...
    }

    /**
     * Get a static PayPal instance
     * @return static
     */
    public static function instance(): static
    {
        return new static();
    }
}
