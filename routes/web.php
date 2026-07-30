<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::view('/', 'index');

Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/login', 'login');
Route::view('/register', 'register');
Route::view('/forgot-password', 'forgot-password');
Route::view('/services', 'services');
Route::view('/reviews', 'reviews');
Route::view('/booking', 'booking');
Route::post('/register', [AuthController::class, 'register']);
