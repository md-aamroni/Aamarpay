<?php

namespace Aamroni\Aamarpay\Interfaces;

interface PayloadInterface
{
    /**
     * Define the base or default currency
     * @var string
     */
    public const DEFAULT_CURRENCY = 'BDT';

    /**
     * Define the base or default country
     * @var string
     */
    public const COUNTRY_ISO_CODE = 'Bangladesh';

    /**
     * Define the sandbox data type
     * @var string
     */
    public const SANDBOX_DATATYPE = 'json';

    /**
     * Get the entities resource collection
     * @return array
     */
    public function resource(): array;
}
