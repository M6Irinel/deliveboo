<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function($app){
            return new Gateway(
                [
                    'environment' => env('ENVIROnMENT'),
                    'merchantId' => env('MERCHANT_ID'),
                    'publicKey' => env('PUBLIC_KEY'),
                    'privateKey' => env('PRIVATE_KEY'),
                ]
            );
        });
    }
}
