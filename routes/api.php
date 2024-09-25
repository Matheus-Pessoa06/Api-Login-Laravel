<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;




Route::post('/login', [LoginController::class, 'index']);

Route::post('/create', [UserController::class, 'store']);
