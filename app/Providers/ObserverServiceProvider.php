<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\User;
use App\Observers\CompanyObserver;
use App\Models\WarehouseItem;
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
    }
}
