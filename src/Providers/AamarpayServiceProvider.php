<?php

namespace Aamroni\Aamarpay\Providers;

use Aamroni\Aamarpay\AamarpayPaymentManager;
use Aamroni\Aamarpay\Facades\Aamarpay;
use Illuminate\Support\ServiceProvider;

class AamarpayServiceProvider extends ServiceProvider
{
    /**
     * Register aamarpay payment services
     * @return void
     */
    public function register(): void
    {
        // @todo: bind the base class
        $this->app->bind(abstract: Aamarpay::class, concrete: AamarpayPaymentManager::class);

        // @todo: merge the config file
        $this->mergeConfigFrom(path: __DIR__.'/../../config/aamarpay.php', key: 'payment');
    }

    /**
     * Bootstrap aamarpay payment services
     * @return void
     */
    public function boot(): void
    {
        // @todo: publish the config file
        $this->publishes(paths: [
            __DIR__.'/../../config/aamarpay.php' => config_path(path: 'aamarpay.php'),
        ], groups: 'aamroni-aamarpay');
    }
}
