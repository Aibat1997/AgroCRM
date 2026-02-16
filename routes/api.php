<?php

use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\AuthorizationController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CottonPreparationController;
use App\Http\Controllers\Api\CottonPurchasePriceController;
use App\Http\Controllers\Api\CreditController;
use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Api\DebtController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\MachineryController;
use App\Http\Controllers\Api\PaymentFrequencyController;
use App\Http\Controllers\Api\PaymentMethodController;
use App\Http\Controllers\Api\RealEstateController;
use App\Http\Controllers\Api\RealEstateRentalController;
use App\Http\Controllers\Api\RealEstateTypeController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\TransactionFormFieldController;
use App\Http\Controllers\Api\TransactionTypeController;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserTaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WarehouseController;
use App\Http\Controllers\Api\WarehouseItemController;
use App\Models\CottonPreparation;
use App\Models\CottonPurchasePrice;

Route::name('api.')->group(function () {
    Route::post('register', [AuthorizationController::class, 'register'])->middleware('throttle:3,1');
    Route::post('login', [AuthorizationController::class, 'login'])->middleware('throttle:3,1');

    Route::get('companies', [CompanyController::class, 'index']);
    Route::get('registration-roles', [RoleController::class, 'registrationRoles']);

    Route::middleware(['auth:api'])->group(function () {
        Route::get('roles', [RoleController::class, 'index']);
        Route::get('units', [UnitController::class, 'index']);
        Route::get('currencies', [CurrencyController::class, 'index']);
        Route::get('real-estate-types', [RealEstateTypeController::class, 'index']);
        Route::get('payment-frequencies', [PaymentFrequencyController::class, 'index']);
        Route::get('cotton-purchase-price', [CottonPurchasePriceController::class, 'index']);
        Route::get('transaction-types', [TransactionTypeController::class, 'index']);
        Route::get('transaction-form-fields', [TransactionFormFieldController::class, 'index']);
        Route::get('payment-methods', [PaymentMethodController::class, 'index']);

        Route::post('logout', [AuthorizationController::class, 'logout']);

        Route::get('user', [UserController::class, 'profile']);

        Route::apiResource('companies', CompanyController::class)->except(['index']);

        Route::apiResource('employees', EmployeeController::class);

        Route::apiResource('clients', ClientController::class);

        Route::apiResource('warehouses', WarehouseController::class);

        Route::apiResource('warehouse-items', WarehouseItemController::class);

        Route::apiResource('machineries', MachineryController::class);

        Route::apiResource('real-estates', RealEstateController::class);

        Route::post('cotton-preparation-weigher', [CottonPreparationController::class, 'storeWeigherData'])->can('storeWeigherData', CottonPreparation::class);
        Route::post('cotton-preparation-laboratorian/{cottonPreparation}', [CottonPreparationController::class, 'storeLaboratorianData'])->can('storeLaboratorianData', CottonPreparation::class);
        Route::apiResource('cotton-preparations', CottonPreparationController::class)->except('store');

        Route::post('cotton-purchase-price', [CottonPurchasePriceController::class, 'store'])->can('create', CottonPurchasePrice::class);

        Route::apiResource('real-estate-rentals', RealEstateRentalController::class);

        Route::apiResource('user-tasks', UserTaskController::class)->except('update');

        Route::apiResource('applications', ApplicationController::class);

        Route::apiResource('debts', DebtController::class);
        Route::get('debt-paying-with-cotton', [DebtController::class, 'payingWithCotton']);

        Route::apiResource('credits', CreditController::class);

        Route::apiResource('transactions', TransactionController::class);
    });
});
