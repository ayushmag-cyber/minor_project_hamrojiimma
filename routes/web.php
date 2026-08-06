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
use App\Http\Controllers\ProviderController;

/** Public Pages */

Route::get('/', function () {
    $reviews = Review::latest()->take(6)->get();
    return view('index', compact('reviews'));
});

Route::view('/about','about');
Route::view('/contact','contact');
Route::view('/login','login')->name('login');
Route::view('/register','register')->name('register');
Route::view('/forgot-password','forgot-password');


/** Reviews */

Route::get('/reviews',[ReviewController::class,'index'])
    ->name('reviews');

Route::post('/reviews',[ReviewController::class,'store'])
    ->middleware('auth')
    ->name('review.store');

Route::get('/reviews/{review}/edit',[ReviewController::class,'edit'])
    ->middleware('auth')
    ->name('review.edit');

Route::put('/reviews/{review}',[ReviewController::class,'update'])
    ->middleware('auth')
    ->name('review.update');

Route::delete('/reviews/{review}',[ReviewController::class,'destroy'])
    ->middleware('auth')
    ->name('review.destroy');


/** Services */

Route::get('/services',[ServiceController::class,'index'])
    ->name('services');

Route::get('/service/{service}',[ServiceController::class,'show'])
    ->name('service.details');


/** Authenticated Routes */

Route::middleware('auth')->group(function(){


    /** Provider */

    Route::get('/provider',[ProviderController::class,'dashboard'])
        ->name('provider.dashboard');

    Route::get('/provider/services',[ProviderController::class,'services']);

    Route::get('/provider/bookings',[ProviderController::class,'bookings'])
        ->name('provider.bookings');

    Route::get('/provider/my-bookings',[ProviderController::class,'myBookings'])
        ->name('provider.mybookings');

    Route::post('/provider/apply-booking/{id}',[ProviderController::class,'applyBooking'])
        ->name('provider.accept');

    Route::post('/provider/cancel-booking/{id}',[ProviderController::class,'cancel'])
        ->name('provider.cancel');

    Route::post('/provider/complete-booking/{id}',[ProviderController::class,'complete'])
        ->name('provider.complete');


    /** Provider Profile */

    Route::get('/provider/profile',
        [ProviderController::class,'profile'])
        ->name('provider.profile');

    Route::get('/provider/profile/edit',
        [ProviderController::class,'editProfile'])
        ->name('provider.profile.edit');

    Route::post('/provider/profile/update',
        [ProviderController::class,'updateProfile'])
        ->name('provider.profile.update');


    /** Dashboard */

    Route::get('/dashboard',function(){

        if(Auth::user()->role == 'admin'){
            return redirect('/admin');
        }

        if(Auth::user()->role == 'provider'){
            return redirect('/provider');
        }

        return view('dashboard');

    });

    /** Admin */

    Route::get('/admin',[AdminController::class,'dashboard']);

    Route::get('/admin/users',[AdminController::class,'users']);

    Route::get('/admin/services',[AdminController::class,'services'])
        ->name('admin.services');

    Route::get('/admin/services/create',[AdminController::class,'createService'])
        ->name('admin.services.create');

    Route::post('/admin/services/store',[AdminController::class,'storeService'])
        ->name('admin.services.store');

    Route::get('/admin/services/edit/{id}',[AdminController::class,'editService'])
        ->name('admin.services.edit');

    Route::put('/admin/services/update/{id}',[AdminController::class,'updateService'])
        ->name('admin.services.update');

    Route::delete('/admin/services/delete/{id}',[AdminController::class,'deleteService'])
        ->name('admin.services.delete');

    Route::get('/admin/services/status/{id}', [AdminController::class, 'changeServiceStatus'])
    ->name('admin.services.status');

    Route::get('/admin/bookings',[AdminController::class,'bookings']);

    Route::get('/admin/reviews',[AdminController::class,'reviews']);

    Route::delete('/admin/reviews/delete/{id}',[AdminController::class,'deleteReview'])
        ->name('admin.review.delete');

    /** Admin Settings */

    Route::view('/admin/settings','admin.settings');

    Route::post('/admin/update-password',[AdminController::class,'updatePassword']);

    Route::post('/admin/update-profile',[AdminController::class,'updateProfile']);


    /** Admin Providers */

    Route::get('/admin/providers',[AdminController::class,'providers'])
        ->name('admin.providers');

    Route::get('/admin/providers/create',[AdminController::class,'createProvider'])
        ->name('admin.providers.create');

    Route::post('/admin/providers/store',[AdminController::class,'storeProvider'])
        ->name('admin.providers.store');


    /** Booking */
    Route::get('/booking',[BookingController::class,'create']);

    Route::post('/booking',[BookingController::class,'store']);

    Route::get('/my-bookings',[MyBookingController::class,'index']);

    Route::post('/booking/approve/{id}',[BookingController::class,'approve'])
        ->name('booking.approve');

    Route::get('/booking/complete/{id}',[BookingController::class,'complete']);

    Route::get('/booking/cancel/{id}',[BookingController::class,'cancel']);

    /** Profile */

    Route::post('/profile/update',[ProfileController::class,'update']);

});

/** Authentication */

Route::post('/register',[AuthController::class,'register']);

Route::post('/login',[AuthController::class,'login']);

Route::post('/logout',function(){

    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/');

});

/** Contact */

Route::post('/contact',[ContactController::class,'store']);

/** Payment */

Route::get('/payment/{booking}',function($booking){

    $booking = \App\Models\Booking::with('service')
        ->findOrFail($booking);

    return view('payment',compact('booking'));

})->name('payment');


Route::get('/payment-success',function(){

    return view('payment-success');

})->name('payment.success');