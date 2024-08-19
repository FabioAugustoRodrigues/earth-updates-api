<?php

use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::post('users/login', [UserController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/users', [UserController::class, 'store']);
});