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
                    'environment' => 'sandbox',
                'merchantId' => 'xfq6fk8bjfywq4mc',
                'publicKey' => 'gbhtn4qfxr4mf6fn',
                'privateKey' => '7723e05c0f865e00a3e5bc90e5c572da'
                ]
            );
        });




    
    }
}


