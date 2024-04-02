<?php

namespace Aamroni\Aamarpay\Adapters;

abstract readonly class HttpReqAdapter extends ForFendAdapter
{
    /**
     * Create a new aamarpay instance
     * @return void
     */
    final public function __construct()
    {
        // TODO: Your Code Here...
    }

    /**
     * Get a static aamarpay instance
     * @return static
     */
    public static function instance(): static
    {
        return new static();
    }

    /**
     * Inherited class must be extended
     * @return mixed
     */
    abstract public function process(): mixed;
}
