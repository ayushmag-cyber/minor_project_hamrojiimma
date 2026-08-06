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

Route::get('/reviews', [ReviewController::class, 'index'])
    ->name('reviews');

Route::post('/reviews', [ReviewController::class, 'store'])
    ->middleware('auth')
    ->name('review.store');

Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])
    ->middleware('auth')
    ->name('review.edit');

Route::put('/reviews/{review}', [ReviewController::class, 'update'])
    ->middleware('auth')
    ->name('review.update');

Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])
    ->middleware('auth')
    ->name('review.destroy');


/* Services */

Route::get('/services', [ServiceController::class, 'index'])
    ->name('services');

Route::get('/service/{service}', [ServiceController::class, 'show'])
    ->name('service.details');


/* Protected Routes */

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {

        if(Auth::user()->role == 'admin'){
            return redirect('/admin');
        }

        return view('dashboard');

    });


    /* Admin */

    Route::get('/admin', [AdminController::class, 'dashboard']);

    Route::get('/admin/users', [AdminController::class, 'users']);

    Route::get('/admin/services', [AdminController::class, 'services'])
        ->name('admin.services');


    Route::get('/admin/services/create', [AdminController::class, 'createService'])
        ->name('admin.services.create');

    Route::post('/admin/services/store', [AdminController::class, 'storeService'])
        ->name('admin.services.store');

    Route::get('/admin/services/edit/{id}', [AdminController::class, 'editService'])
        ->name('admin.services.edit');

    Route::put('/admin/services/update/{id}', [AdminController::class, 'updateService'])
        ->name('admin.services.update');

    Route::delete('/admin/services/delete/{id}', [AdminController::class, 'deleteService'])
        ->name('admin.services.delete');


    Route::get('/admin/bookings', [AdminController::class, 'bookings']);

    Route::get('/admin/reviews', [AdminController::class, 'reviews']);

    Route::delete('/admin/reviews/delete/{id}', [AdminController::class, 'deleteReview'])
        ->name('admin.review.delete');


    Route::view('/admin/settings', 'admin.settings');

    Route::post('/admin/update-password', [AdminController::class, 'updatePassword']);


    /* Booking */

    Route::get('/booking', [BookingController::class, 'create']);

    Route::post('/booking', [BookingController::class, 'store']);

    Route::get('/my-bookings', [MyBookingController::class, 'index']);


    Route::get('/booking/approve/{id}', [BookingController::class, 'approve']);

    Route::get('/booking/complete/{id}', [BookingController::class, 'complete']);

    Route::get('/booking/cancel/{id}', [BookingController::class, 'cancel']);


    /* Profile */

    Route::post('/profile/update', [ProfileController::class, 'update']);

});


/* Authentication */

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/admin/update-profile', [AdminController::class, 'updateProfile']);


Route::post('/logout', function () {

    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/');

});

/* Contact */

Route::post('/contact', [ContactController::class, 'store']);
Route::get('/payment/{booking}', function($booking){

    $booking = \App\Models\Booking::with('service')->findOrFail($booking);

    return view('payment', compact('booking'));

})->name('payment');


Route::get('/payment-success', function(){

    return view('payment-success');

})->name('payment.success');