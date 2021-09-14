<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ConsultaCep\Providers\viaCEP;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Services\ConsultaCep\ConsultaCEPInterface;

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
        JsonResource::withoutWrapping();
    }
}
