<?php

use App\Http\Controllers\Api\ConfigHeaterController;
use App\Http\Controllers\Api\ConfigLampuController;
use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\LdrController;
use App\Http\Controllers\Api\DhtController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/user/device/{id}', [UserController::class, 'showDevice']);
Route::post('/user', [UserController::class, 'store']);

Route::get('/device', [DeviceController::class, 'index']);
Route::post('/device', [DeviceController::class, 'store']);
Route::get('/device/dht/{kode}', [DeviceController::class, 'showDht']);
Route::get('/device/ldr/{kode}', [DeviceController::class, 'showLdr']);
Route::get('/device/lampu/{kode}', [DeviceController::class, 'showLampu']);
Route::get('/device/heater/{kode}', [DeviceController::class, 'showHeater']);

Route::get('/dht', [DhtController::class, 'index']);
Route::get('/dht/{device_kode}', [DhtController::class, 'show']);
Route::post('/dht', [DhtController::class, 'store']);

Route::get('/ldr', [LdrController::class, 'index']);
Route::get('/ldr/{device_kode}', [LdrController::class, 'show']);
Route::post('/ldr', [LdrController::class, 'store']);

Route::get('/lampu', [ConfigLampuController::class, 'index']);
Route::get('/lampu/{device_kode}', [ConfigLampuController::class, 'show']);
Route::post('/lampu', [ConfigLampuController::class, 'store']);

Route::get('/heater', [ConfigHeaterController::class, 'index']);
Route::get('/heater/{device_kode}', [ConfigHeaterController::class, 'show']);
Route::post('/heater', [ConfigHeaterController::class, 'store']);

Route::post('/data', [DataController::class, 'store']);