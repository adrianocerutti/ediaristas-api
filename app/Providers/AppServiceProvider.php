<?php

namespace App\Providers;

use App\Services\ConsultaCep\ConsultaCEPInterface;
use App\Services\ConsultaCep\Providers\viaCEP;
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
        $this->app->singleton(ConsultaCEPInterface::class, function($app) {
            return new viaCEP;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
