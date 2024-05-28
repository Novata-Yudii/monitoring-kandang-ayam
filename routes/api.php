<?php

use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\LdrController;
use App\Http\Controllers\Api\DhtController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/user/device/{id}', [UserController::class, 'showDevice']);

Route::get('/device', [DeviceController::class, 'index']);
// Route::get('/device/{id}', [DeviceController::class, 'show']);
Route::post('/device', [DeviceController::class, 'store']);
Route::get('/device/dht/{id}', [DeviceController::class, 'showDht']);
Route::get('/device/ldr/{id}', [DeviceController::class, 'showLdr']);

Route::get('/dht', [DhtController::class, 'index']);
Route::get('/dht/{device_id}', [DhtController::class, 'show']); //detail pemilik dan device dari dht
Route::post('/dht', [DhtController::class, 'store']);

Route::get('/ldr', [LdrController::class, 'index']);
Route::get('/ldr/{device_id}', [LdrController::class, 'show']); //detail pemilik dan device dari ldr
Route::post('/ldr', [LdrController::class, 'store']);

// Menjadikan primary key pada kolom fase device di tabel devices, jangan gunakan id sebagai primary key
