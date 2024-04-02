

### Composer Install
```shell
composer require aamroni/aamarpay
```

### Publish Config
```shell
php artisan vendor:publish --tag=aamroni-aamarpay
```

### Usage Example
```php
use Aamroni\Aamarpay\AamarpayPaymentManager;
use Aamroni\Aamarpay\Entities\CustomerPayload;
use Aamroni\Aamarpay\Entities\PurchasePayload;
use Aamroni\Aamarpay\Facades\Aamarpay;

// @step01: Create a customer instance
$customer = CustomerPayload::instance(
    name:       'Kabir Khan',
    email:      'kabirkhan@gmail.com',
    phone:      '+8801645770422',
    street1:    'House B-158 Road 22',
    street2:    'Baridhara DOHS',
    city:       'Dhaka',
    state:      'Dhaka',
    country:    'Bangladesh'
);

// @step02: Create a products instance
$purchase = PurchasePayload::instance(
    invoice:    'INV-00001',
    amount:     10.0,
    detail:     'Something about service or product'
);

// @step03: Process the checkout
$response = Aamarpay::checkout(purchase: $purchase, customer: $customer);
// or using facade
$response = AamarpayPaymentManager::instance()->checkout(purchase: $purchase, customer: $customer);

dd($response);
```
