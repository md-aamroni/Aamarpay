<?php

namespace Aamroni\Aamarpay;

use Aamroni\Aamarpay\Adapters\PaymentAdapter;
use Aamroni\Aamarpay\Contracts\CheckoutContract;
use Aamroni\Aamarpay\Entities\CustomerPayload;
use Aamroni\Aamarpay\Entities\PurchasePayload;
use Aamroni\Aamarpay\Exceptions\PaymentException;
use Throwable;

readonly class AamarpayPaymentManager extends PaymentAdapter
{
    /**
     * Process the checkout request
     * @param  PurchasePayload $purchase
     * @param  CustomerPayload $customer
     * @return mixed
     */
    public function checkout(PurchasePayload $purchase, CustomerPayload $customer): mixed
    {
        try {
            $resource = array_merge_recursive($purchase->resource(), $customer->resource());
            $response = CheckoutContract::instance()->process(payload: $resource);
            if (empty($resource) && !isset($response)) {
                throw new PaymentException();
            }
            return $response->payment_url;
        } catch (Throwable $exception) {
            return $exception->getMessage();
        }
    }
}
