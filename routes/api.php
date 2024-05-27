<?php

use App\Http\Controllers\api\LdrController;
use App\Http\Controllers\api\DhtController;
use Illuminate\Support\Facades\Route;

Route::get('/dht', [DhtController::class, 'index']);
Route::get('/dht/{id}', [DhtController::class, 'show']);
Route::post('/dht', [DhtController::class, 'store']);

Route::get('/ldr', [LdrController::class, 'index']);
Route::get('/ldr/{id}', [LdrController::class, 'show']);
Route::post('/ldr', [LdrController::class, 'store']);

