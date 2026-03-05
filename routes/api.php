<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VideoController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;

// Registration routes
Route::post('/register/admin', [RegisterController::class, 'registerAdmin']);
Route::post('/register/user', [RegisterController::class, 'registerUser']);

// Login route
Route::post('/login', [LoginController::class, 'login']);

// Protected example (after login, use token in headers)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::get('/videos', [VideoController::class, 'index']);
    Route::get('/materials', [MaterialController::class, 'index']);
});
