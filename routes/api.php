<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CharacterController;
use App\Http\Controllers\Api\MediaController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('characters', CharacterController::class);
    Route::apiResource('media',      MediaController::class);
});
