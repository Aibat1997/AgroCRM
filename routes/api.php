<?php

use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\AuthorizationController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CottonPreparationController;
use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\MachineryController;
use App\Http\Controllers\Api\PaymentFrequencyController;
use App\Http\Controllers\Api\RealEstateController;
use App\Http\Controllers\Api\RealEstateRentalController;
use App\Http\Controllers\Api\RealEstateTypeController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserTaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WarehouseController;
use App\Http\Controllers\Api\WarehouseItemController;
use App\Models\CottonPreparation;

Route::name('api.')->group(function () {
    Route::post('register', [AuthorizationController::class, 'register']);
    Route::post('login', [AuthorizationController::class, 'login']);

    Route::get('roles', [RoleController::class, 'index']);
    Route::get('units', [UnitController::class, 'index']);
    Route::get('currencies', [CurrencyController::class, 'index']);
    Route::get('real-estate-types', [RealEstateTypeController::class, 'index']);
    Route::get('companies', [CompanyController::class, 'index']);
    Route::get('payment-frequencies', [PaymentFrequencyController::class, 'index']);

    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', [AuthorizationController::class, 'logout']);

        Route::get('user', [UserController::class, 'profile']);

        Route::apiResource('company', CompanyController::class)->except(['index']);

        Route::get('employees', [EmployeeController::class, 'index']);
        Route::apiResource('employee', EmployeeController::class)->except(['index']);

        Route::get('clients', [ClientController::class, 'index']);
        Route::apiResource('client', ClientController::class)->except(['index']);

        Route::get('warehouses', [WarehouseController::class, 'index']);
        Route::apiResource('warehouse', WarehouseController::class)->except(['index']);

        Route::get('warehouse-items', [WarehouseItemController::class, 'index']);
        Route::apiResource('warehouse-item', WarehouseItemController::class)->except(['index']);

        Route::get('machineries', [MachineryController::class, 'index']);
        Route::apiResource('machinery', MachineryController::class)->except(['index']);

        Route::get('real-estates', [RealEstateController::class, 'index']);
        Route::apiResource('real-estate', RealEstateController::class)->except(['index']);

        Route::get('cotton-preparations', [CottonPreparationController::class, 'index']);
        Route::post('cotton-preparation-weigher', [CottonPreparationController::class, 'storeWeigherData'])->can('storeWeigherData', CottonPreparation::class);
        Route::post('cotton-preparation-laboratorian/{cottonPreparation}', [CottonPreparationController::class, 'storeLaboratorianData'])->can('storeLaboratorianData', CottonPreparation::class);
        Route::apiResource('cotton-preparation', CottonPreparationController::class)->except(['index', 'store']);

        Route::get('real-estate-rentals', [RealEstateRentalController::class, 'index']);
        Route::apiResource('real-estate-rental', RealEstateRentalController::class)->except(['index']);

        Route::get('user-tasks', [UserTaskController::class, 'index']);
        Route::apiResource('user-task', UserTaskController::class)->except(['index']);

        Route::get('applications', [ApplicationController::class, 'index']);
        Route::apiResource('application', ApplicationController::class)->except(['index']);
    });
});
