<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::post('login', [App\Http\Controllers\Api\LoginController::class, 'login']);

Route::apiResource('v1/user', App\Http\Controllers\Api\V1\UserController::class)
->only('index', 'show', 'store', 'destroy')
->middleware('auth:sanctum');

Route::apiResource('v1/job_offer', App\Http\Controllers\Api\V1\JobOfferController::class)
->only('index', 'show', 'store', 'destroy')
->middleware('auth:sanctum');

Route::apiResource('v1/user_job_offer', App\Http\Controllers\Api\V1\UserJobOfferController::class)
->only('index', 'show', 'store', 'destroy')
->middleware('auth:sanctum');