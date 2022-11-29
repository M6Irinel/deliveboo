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
                    "environment" => "rpdz2h6dvbg4b3nb", 
                    "merchantId" => "z3ndhvftb2mwzq2f",
                    "publicKey" => "e6c6f1013149067ab94d5254cb831ba0"
                ]
                );
        });

        }
    }

