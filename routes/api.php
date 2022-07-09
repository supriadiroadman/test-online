<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\UserController;


Route::post('/users/signup', [RegisterController::class, 'index']);
Route::post('/users/sigin', [LoginController::class, 'index']);

Route::get('/users', [UserController::class, 'index']);

Route::get('/shopping', [ShoppingController::class, 'index']);
Route::post('/shopping', [ShoppingController::class, 'store']);
Route::get('/shopping/{id}', [ShoppingController::class, 'show']);
Route::put('/shopping/{id}', [ShoppingController::class, 'update']);
Route::delete('/shopping/{id}', [ShoppingController::class, 'destroy']);
