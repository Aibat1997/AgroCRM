<?php

use App\Http\Controllers\Api\AuthorizationController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\LaboratoryCalculationController;
use App\Http\Controllers\Api\MachineryController;
use App\Http\Controllers\Api\RealEstateController;
use App\Http\Controllers\Api\RealEstateTypeController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WarehouseController;
use App\Http\Controllers\Api\WarehouseItemController;

Route::name('api.')->group(function () {
    Route::post('register', [AuthorizationController::class, 'register']);
    Route::post('login', [AuthorizationController::class, 'login']);

    Route::get('roles', [RoleController::class, 'index']);
    Route::get('units', [UnitController::class, 'index']);
    Route::get('real-estate-types', [RealEstateTypeController::class, 'index']);
    Route::get('companies', [CompanyController::class, 'index']);

    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', [AuthorizationController::class, 'logout']);

        Route::get('user', [UserController::class, 'profile']);

        Route::get('employees', [EmployeeController::class, 'index']);
        Route::apiResource('employee', EmployeeController::class)->except(['index']);

        Route::get('clients', [ClientController::class, 'index']);
        Route::apiResource('client', ClientController::class)->except(['index']);

        Route::get('warehouses', [WarehouseController::class, 'index']);
        Route::apiResource('warehouse', WarehouseController::class)->except(['index']);

        Route::get('warehouse-items/{warehouse}', [WarehouseItemController::class, 'index']);
        Route::apiResource('warehouse-item', WarehouseItemController::class)->except(['index']);

        Route::get('machineries', [MachineryController::class, 'index']);
        Route::apiResource('machinery', MachineryController::class)->except(['index']);

        Route::get('real-estates', [RealEstateController::class, 'index']);
        Route::apiResource('real-estate', RealEstateController::class)->except(['index']);

        Route::get('laboratory-calculations', [LaboratoryCalculationController::class, 'index']);
        Route::apiResource('laboratory-calculation', LaboratoryCalculationController::class)->except(['index']);
    });
});
