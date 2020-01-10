<?php

namespace App\Providers;

use App\Contracts\PaymentGatewayContract;
use App\Models\PaymentProviders\StripePayment;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PaymentGatewayContract::class, StripePayment::class);
    }
}
