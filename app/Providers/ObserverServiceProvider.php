<?php

namespace App\Providers;

use App\Models\Application;
use App\Models\Company;
use App\Models\RealEstateRental;
use App\Models\User;
use App\Observers\CompanyObserver;
use App\Models\WarehouseItem;
use App\Observers\ApplicationObserver;
use App\Observers\RealEstateRentalObserver;
use App\Observers\UserObserver;
use App\Observers\WarehouseItemObserver;
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
        WarehouseItem::observe(WarehouseItemObserver::class);
        User::observe(UserObserver::class);
        Company::observe(CompanyObserver::class);
        RealEstateRental::observe(RealEstateRentalObserver::class);
        Application::observe(ApplicationObserver::class);
    }
}
