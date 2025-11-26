<?php

use App\Http\Controllers\Api\AuthorizationController;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::post('register', [AuthorizationController::class, 'register']);
    Route::post('login', [AuthorizationController::class, 'login']);

    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', [AuthorizationController::class, 'logout']);
    });
});
