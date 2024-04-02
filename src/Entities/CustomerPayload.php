<?php

namespace Aamroni\Aamarpay\Entities;

use Aamroni\Aamarpay\Interfaces\PayloadInterface;

readonly class CustomerPayload implements PayloadInterface
{
    /**
     * Crate a new customer entity
     * @return void
     */
    final public function __construct(
        public ?string $name    = null,
        public ?string $email   = null,
        public ?string $phone   = null,
        public ?string $street1 = null,
        public ?string $street2 = null,
        public ?string $city    = null,
        public ?string $state   = null,
        public ?string $country = self::COUNTRY_ISO_CODE,
    ) {
        // TODO: Skip Code Here...
    }

    /**
     * Get a static customer entity
     * @param  string|null $name
     * @param  string|null $email
     * @param  string|null $phone
     * @param  string|null $street1
     * @param  string|null $street2
     * @param  string|null $city
     * @param  string|null $state
     * @param  string|null $country
     * @return static
     */
    public static function instance(
        ?string $name       = null,
        ?string $email      = null,
        ?string $phone      = null,
        ?string $street1    = null,
        ?string $street2    = null,
        ?string $city       = null,
        ?string $state      = null,
        ?string $country    = self::COUNTRY_ISO_CODE,
    ): static {
        return new static($name, $email, $phone, $street1, $street2, $city, $state, $country);
    }

    /**
     * Get the entities resource collection
     * @return array
     */
    public function resource(): array
    {
        return [
            'cus_name'      => $this->name,
            'cus_email'     => $this->email,
            'cus_phone'     => $this->phone,
            'cus_add1'      => $this->street1,
            'cus_add2'      => $this->street2,
            'cus_city'      => $this->city,
            'cus_state'     => $this->state,
            'cus_country'   => $this->country,
        ];
    }
}
