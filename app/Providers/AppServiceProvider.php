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
<<<<<<< HEAD
                    'enviroment' => 'sandbox',
                    'merchantId' => 'rpdz2h6dvbg4b3nb',
                    'publicKey' => 'z3ndhvftb2mwzq2f',
                    'privateKey' => 'e6c6f1013149067ab94d5254cb831ba0'
=======
                    'enviroment' => env('ENVIROMENT'),
                    'merchantId' => env('MERCHANT_ID'),
                    'publicKey' => env('PUBLIC_KEY'),
                    'privateKey' => env('PRIVATE_KEY')
>>>>>>> feature/ordinare1
                ]
            );
        });
    }
}
