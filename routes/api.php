<?php

use App\Http\Controllers\Api\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::post('login', [UserAuthController::class, 'login']);

    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', [UserAuthController::class, 'logout']);
    });
});
