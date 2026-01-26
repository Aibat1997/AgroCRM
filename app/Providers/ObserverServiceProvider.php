<?php

namespace App\Providers;

use App\Models\CottonPreparation;
use App\Observers\CottonPreparationObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        CottonPreparation::observe(CottonPreparationObserver::class);
    }
}
