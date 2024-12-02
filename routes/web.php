<?php

use App\Http\Controllers\WEB\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/subscribers/{email}/verify/{token}', [SubscriberController::class, 'verifyEmail']);
