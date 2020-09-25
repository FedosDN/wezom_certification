<?php

namespace App\Providers;

use App\Services\Import\ImportMakes;
use App\Services\Import\ImportMakesInterface;
use App\Services\Import\ImportModels;
use App\Services\Import\ImportModelsInterface;
use App\Services\Vin\ParseUSAVin;
use App\Services\Vin\ParseVinInterface;
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
        $this->app->bind(ImportMakesInterface::class, ImportMakes::class);
        $this->app->bind(ImportModelsInterface::class, ImportModels::class);
        $this->app->bind(ParseVinInterface::class, ParseUSAVin::class);
    }
}
