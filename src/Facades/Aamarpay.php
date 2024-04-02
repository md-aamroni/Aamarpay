<?php

namespace Aamroni\Aamarpay\Facades;

use Aamroni\Aamarpay\AamarpayPaymentManager;
use Aamroni\Aamarpay\Entities\CustomerPayload;
use Aamroni\Aamarpay\Entities\PurchasePayload;
use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed checkout(PurchasePayload $purchase, CustomerPayload $customer)
 */
class Aamarpay extends Facade
{
    /**
     * Get a aamarpay facade instance
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return AamarpayPaymentManager::class;
    }
}
