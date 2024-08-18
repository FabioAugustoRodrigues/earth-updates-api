<?php

use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return response()->json(['message' => 'Route not found'], 404);
});



// USERS
Route::post('/users', [UserController::class, 'store']);