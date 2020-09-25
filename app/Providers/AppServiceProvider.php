<?php

namespace App\Providers;

use App\Services\Import\ImportMakes;
use App\Services\Import\ImportMakesInterface;
use App\Services\Import\ImportModels;
use App\Services\Import\ImportModelsInterface;
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
    }
}
