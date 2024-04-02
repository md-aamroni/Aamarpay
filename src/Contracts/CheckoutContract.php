<?php

namespace Aamroni\Aamarpay\Contracts;

use Aamroni\Aamarpay\Adapters\HttpReqAdapter;
use Aamroni\Aamarpay\Supports\HttpRequestHandler;
use Illuminate\Support\Facades\Http;

readonly class CheckoutContract extends HttpReqAdapter
{
    /**
     * Inherited class must be extended
     * @param  array|null  $payload
     * @param  string|null $collect
     * @return mixed
     */
    public function process(?array $payload = []): mixed
    {
        $baseLink = env(key: 'APP_ENV') === 'production'
            ? 'https://secure.aamarpay.com/jsonpost.php'
            : 'https://sandbox.aamarpay.com/jsonpost.php';
        $response = Http::withHeaders(headers: ['Content-Type' => 'application/json'])
            ->asJson()
            ->post(url: $baseLink, data: $payload);
        return HttpRequestHandler::instance(response: $response)->process();
    }
}
