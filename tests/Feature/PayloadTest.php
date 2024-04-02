<?php

test('customer payload assertion must be validated', function () {
    $instance = \Aamroni\Aamarpay\Entities\CustomerPayload::instance(
        name:       'Kabir Khan',
        email:      'kabirkhan@gmail.com',
        phone:      '+8801645770422',
        street1:    'House B-158 Road 22',
        street2:    'Mohakhali DOHS',
        city:       'Dhaka',
        state:      'Dhaka'
    );
    expect($instance)
        ->toBeInstanceOf(\Aamroni\Aamarpay\Entities\CustomerPayload::class)
        ->toHaveProperties(['name', 'email', 'phone', 'street1', 'street2', 'city', 'state', 'country'])
        ->and($instance->resource())
        ->toBeArray()
        ->toHaveCount(8)
        ->toEqual([
            'cus_name'      => 'Kabir Khan',
            'cus_email'     => 'kabirkhan@gmail.com',
            'cus_phone'     => '+8801645770422',
            'cus_add1'      => 'House B-158 Road 22',
            'cus_add2'      => 'Mohakhali DOHS',
            'cus_city'      => 'Dhaka',
            'cus_state'     => 'Dhaka',
            'cus_country'   => 'Bangladesh',
        ]);
});


test('purchase payload assertion must be validated', function () {
    $instance = \Aamroni\Aamarpay\Entities\PurchasePayload::instance(
        invoice: 'INV-001451',
        amount: 10.0,
        detail: 'Something about service or product'
    );
    expect($instance)->toBeInstanceOf(\Aamroni\Aamarpay\Entities\PurchasePayload::class)
        ->toHaveProperties(['invoice', 'amount', 'currency', 'detail', 'type']);
    //        ->and($instance->resource())
    //        ->toBeArray()
    //        ->toHaveCount(10)
    //        ->toEqual([
    //            'store_id'      => '',
    //            'signature_key' => '',
    //            'success_url'   => sprintf('%s/aamarpay/success', env('APP_URL')),
    //            'fail_url'      => sprintf('%s/aamarpay/failed', env('APP_URL')),
    //            'cancel_url'    => sprintf('%s/aamarpay/cancel', env('APP_URL')),
    //            'tran_id'       => 'INV-001451',
    //            'amount'        => '10.0',
    //            'currency'      => 'BDT',
    //            'desc'          => 'Something about service or product',
    //            'type'          => 'json',
    //        ]);
});
