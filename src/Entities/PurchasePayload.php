<?php

namespace Aamroni\Aamarpay\Entities;

use Aamroni\Aamarpay\Interfaces\PayloadInterface;
use Aamroni\Aamarpay\Traits\ConfigFileContentTrait;

readonly class PurchasePayload implements PayloadInterface
{
    use ConfigFileContentTrait;

    /**
     * Create a new purchase entity
     * @return void
     */
    final public function __construct(
        public ?string   $invoice   = null,
        public int|float $amount    = 0,
        public ?string   $currency  = self::DEFAULT_CURRENCY,
        public ?string   $detail    = null,
        public ?string   $type      = self::SANDBOX_DATATYPE,
    ) {
        // TODO: Skip Code Here...
    }

    /**
     * Get a static purchase entity
     */
    public static function instance(
        ?string   $invoice  = null,
        int|float $amount   = 0,
        ?string   $currency = self::DEFAULT_CURRENCY,
        ?string   $detail   = null,
        ?string   $type     = self::SANDBOX_DATATYPE,
    ): static {
        return new static($invoice, $amount, $currency, $detail, $type);
    }

    /**
     * Get the entities resource collection
     */
    public function resource(): array
    {
        $config = $this->configFileContent();
        return [
            'store_id'      => $config->storeID,
            'signature_key' => $config->signature,
            'success_url'   => $config->redirect->success,
            'fail_url'      => $config->redirect->failed,
            'cancel_url'    => $config->redirect->cancel,
            'tran_id'       => $this->invoice,
            'amount'        => $this->amount,
            'currency'      => $this->currency,
            'desc'          => $this->detail,
            'type'          => $this->type,
        ];
    }
}
