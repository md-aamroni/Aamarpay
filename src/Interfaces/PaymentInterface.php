<?php

namespace Aamroni\Aamarpay\Interfaces;

use Aamroni\Aamarpay\Entities\CustomerPayload;
use Aamroni\Aamarpay\Entities\PurchasePayload;

interface PaymentInterface
{
    /**
     * Process the checkout request
     * @param  PurchasePayload $purchase
     * @param  CustomerPayload $customer
     * @return mixed
     */
    public function checkout(PurchasePayload $purchase, CustomerPayload $customer): mixed;
}
