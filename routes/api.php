<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\OTPController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ServiceController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {

    // Authentication Route
    Route::post('logout', [LoginController::class, 'logout']);
    Route::get('user', [AuthenticateController::class, 'loginUser']);

    // Services API Route
    Route::get('services', [ServiceController::class, 'listService']);

});

Route::post('register', [RegisterController::class, 'store']);
Route::post('resend/otp', [OTPController::class, 'resendOTP']);
Route::post('verify/otp', [OTPController::class, 'verifyOTP']);
Route::post('login', [LoginController::class, 'login']);
Route::post('/reset/password', [ResetPasswordController::class, 'resetPassword']);
