<?php

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
