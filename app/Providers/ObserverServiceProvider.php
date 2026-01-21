<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\CottonPreparation;
use App\Models\RealEstateRental;
use App\Models\User;
use App\Observers\CompanyObserver;
use App\Observers\CottonPreparationObserver;
use App\Observers\RealEstateRentalObserver;
use App\Observers\UserObserver;
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
        User::observe(UserObserver::class);
        Company::observe(CompanyObserver::class);
        RealEstateRental::observe(RealEstateRentalObserver::class);
        CottonPreparation::observe(CottonPreparationObserver::class);
    }
}
