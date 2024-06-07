<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\HeaterController;
use App\Http\Controllers\LampuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect('login');
});

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'login']);
Route::get('/logout', [LoginController::class,'logout'])->middleware('auth');

Route::get('/register', function(){
    return view('auth.register');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/user', [UserController::class, 'index'])->middleware(['auth','admin']);
Route::get('/user/create', [UserController::class, 'create'])->middleware(['auth','admin']);
Route::post('/user', [UserController::class, 'store']);
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->middleware(['auth','admin']);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);

Route::get('/device', [DeviceController::class, 'index'])->middleware(['auth','admin']);
Route::get('/device/create', [DeviceController::class, 'create'])->middleware(['auth','admin']);
Route::post('/device', [DeviceController::class, 'store']);
Route::get('/device/edit/{id}', [DeviceController::class, 'edit'])->middleware(['auth','admin']);
Route::put('/device/{id}', [DeviceController::class, 'update']);
Route::delete('/device/{id}', [DeviceController::class, 'destroy']);

Route::get('/lampu', [LampuController::class, 'index'])->middleware('auth');

Route::get('/heater', [HeaterController::class, 'index'])->middleware('auth');