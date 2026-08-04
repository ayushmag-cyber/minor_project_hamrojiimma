<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MyBookingController;
use App\Http\Controllers\AdminController;

/* Public Pages */

Route::get('/', function () {
    $reviews = Review::latest()->take(6)->get();
    return view('index', compact('reviews'));
});

Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');
Route::view('/forgot-password', 'forgot-password');


/* Reviews */

Route::get('/reviews', function () {
    $reviews = Review::latest()->get();
    return view('reviews', compact('reviews'));
});

Route::post('/reviews', [ReviewController::class, 'store'])
    ->middleware('auth')
    ->name('review.store');


/* Services */

Route::get('/services', [ServiceController::class, 'index'])
    ->name('services');

Route::get('/service/{service}', [ServiceController::class, 'show'])
    ->name('service.details');


/* Protected Routes */

Route::middleware('auth')->group(function () {

    /* Dashboard */

    Route::get('/dashboard', function () {

        if (Auth::user()->role == 'admin') {
            return redirect('/admin');
        }

        return view('dashboard');

    });

    /* Admin */

    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/users', [AdminController::class, 'users']);
    Route::get('/admin/services', [AdminController::class, 'services']);
    Route::get('/admin/bookings', [AdminController::class, 'bookings']);
    Route::get('/admin/reviews', [AdminController::class, 'reviews']);
    Route::view('/admin/settings', 'admin.settings');

    Route::post('/admin/update-password', [AdminController::class, 'updatePassword']);

    /* Booking */

    Route::get('/booking', [BookingController::class, 'create']);
    Route::post('/booking', [BookingController::class, 'store']);
    Route::get('/my-bookings', [MyBookingController::class, 'index']);

    /* Booking Actions */

    Route::get('/booking/approve/{id}', [BookingController::class, 'approve']);
    Route::get('/booking/complete/{id}', [BookingController::class, 'complete']);
    Route::get('/booking/cancel/{id}', [BookingController::class, 'cancel']);

    /* Profile */

    Route::post('/profile/update', [ProfileController::class, 'update']);

});


/* Authentication */

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', function () {

    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');

});


/* Contact */

Route::post('/contact', [ContactController::class, 'store']);