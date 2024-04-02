<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Store ID
    |--------------------------------------------------------------------------
    | Your Merchant ID – Provided by aamarPay
    |
    */

    'storeID' => env('AAMARPAY_STORE_ID'),

    /*
    |--------------------------------------------------------------------------
    | Signature Key
    |--------------------------------------------------------------------------
    | You will need to provide the Signature Key issued by aamarPay, which serves
    | as a unique authentication key. (Example: dbb74894e82415a2f7ff0ec3a97e4183 )
    |
    */

    'signature' => env('AAMARPAY_SIGNATURE_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Redirect Links
    |--------------------------------------------------------------------------
    | When the customer completes the payment process, the payment gateway
    | will initiate a POST request it will notify your system  about the transaction
    | and share the relevant payment details based on url.
    |
    */

    'redirect' => [
        /**
         * The success_url is the designated URL to which the payment gateway
         * will redirect customers after a successful payment transaction.
         */
        'success' => sprintf('%s/aamarpay/success', env('APP_URL')),

        /**
         * The fail_url is the designated URL to which the payment gateway
         * will redirect customers after a failed payment transaction.
         */
        'failed' => sprintf('%s/aamarpay/failed', env('APP_URL')),

        /**
         * URL to return customers to your product page or home page.
         */
        'cancel' => sprintf('%s/aamarpay/cancel', env('APP_URL')),
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Currency
    |--------------------------------------------------------------------------
    | The currency field should only contain uppercase letters corresponding
    | to the desired currency (e.g., "USD" or "BDT").
    |
    */

    'currency' => 'BDT',
];
