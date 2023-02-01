<?php

namespace App\Providers;

use App\PaymentService;
use App\PaymentService\PayPalApi;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use App\PaymentService\PaymentServiceInterface;
use Illuminate\Contracts\Support\DeferrableProvider;

class PaymentServiceprovider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(PaymentServiceInterface :: class, PayPalApi :: class);
        app()->bind("Payment", PayPalApi :: class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
