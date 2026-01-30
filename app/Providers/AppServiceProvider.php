<?php

namespace App\Providers;

use App\Models\CottonPreparation;
use App\Models\CottonPurchasePrice;
use App\Models\UserTask;
use App\Policies\CottonPreparationPolicy;
use App\Policies\CottonPurchasePricePolicy;
use App\Policies\UserTaskPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        Gate::policy(CottonPreparation::class, CottonPreparationPolicy::class);
        Gate::policy(CottonPurchasePrice::class, CottonPurchasePricePolicy::class);
        Gate::policy(UserTask::class, UserTaskPolicy::class);
    }
}
