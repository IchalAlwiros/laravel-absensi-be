<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// login
Route::post('/login', [AuthController::class, 'login']);

// login
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


// Company
Route::get('/company/{id}', [CompanyController::class, 'show'])->middleware('auth:sanctum');


// Cheeck In
Route::post('/checkin', [AttendanceController::class, 'checkin'])->middleware('auth:sanctum');


// Cheeck Out
Route::post('/checkout', [AttendanceController::class, 'checkout'])->middleware('auth:sanctum');


// is Checkedin
Route::get('/is-checkin', [AttendanceController::class, 'isCheckedin'])->middleware('auth:sanctum');


// update profile
Route::post('/update-profile', [AuthController::class, 'updateProfile'])->middleware('auth:sanctum');
