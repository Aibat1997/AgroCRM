<?php

use App\Http\Controllers\Api\AuthorizationController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WarehouseController;
use App\Http\Controllers\Api\WarehouseItemController;

Route::name('api.')->group(function () {
    Route::post('register', [AuthorizationController::class, 'register']);
    Route::post('login', [AuthorizationController::class, 'login']);

    Route::get('roles', [RoleController::class, 'index']);
    Route::get('companies', [CompanyController::class, 'index']);

    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', [AuthorizationController::class, 'logout']);

        Route::get('warehouses', [WarehouseController::class, 'index']);
        Route::apiResource('warehouse', WarehouseController::class)->except(['index']);

        Route::get('warehouse-items/{warehouse}', [WarehouseItemController::class, 'index']);
        Route::apiResource('warehouse-item', WarehouseItemController::class)->except(['index']);
    });
});
