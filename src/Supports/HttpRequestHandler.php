<?php

namespace Aamroni\Aamarpay\Supports;

use Aamroni\Aamarpay\Exceptions\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Throwable;

readonly class HttpRequestHandler
{
    /**
     * Create a new resolver instance
     * @return void
     */
    public function __construct(private Response|PromiseInterface $response)
    {
        // TODO: Your Code Here...
    }

    /**
     * Get a static resolver instance
     * @param  Response|PromiseInterface $response
     * @return static
     */
    public static function instance(Response|PromiseInterface $response): static
    {
        return new static($response);
    }

    /**
     * Process the HTTP client response
     * @param  string|null $collect
     * @return mixed
     */
    public function process(?string $collect = null): mixed
    {
        try {
            return $this->successStateHandler($collect);
        } catch (Throwable $throwable) {
            return $this->onErrorStateHandler($throwable->getMessage());
        }
    }

    /**
     * Handle the HTTP client on successful response
     * @throws RequestException
     */
    private function successStateHandler(?string $collect = null): mixed
    {
        if (! $this->response->successful()) {
            throw new RequestException();
        }

        return json_decode($this->response->collect(key: $collect)->toJson());
    }

    /**
     * Handle the HTTP client on error response
     * @param  array|string $errors
     * @return Collection
     */
    private function onErrorStateHandler(array|string $errors): Collection
    {
        return collect((object) ['error' => $errors])->toBase();
    }
}
