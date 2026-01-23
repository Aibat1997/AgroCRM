<?php

namespace App\Providers;

use App\Models\CottonPreparation;
use App\Models\RealEstateRental;
use App\Observers\CottonPreparationObserver;
use App\Observers\RealEstateRentalObserver;
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
        RealEstateRental::observe(RealEstateRentalObserver::class);
        CottonPreparation::observe(CottonPreparationObserver::class);
    }
}
