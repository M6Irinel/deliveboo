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
                    'enviroment' => 'sandbox',
                    'merchantId' => 'mfrfb8y7gxdxp39c',
                    'publicKey' => 'scbd555ds5t4nx2t',
                    'privateKey' => '772608b1cd74b586ec965e00dda99863'
                ]
            );
        });
    }
}
