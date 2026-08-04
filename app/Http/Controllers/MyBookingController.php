<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class MyBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())
                            ->latest()
                            ->get();

        return view('my-bookings', compact('bookings'));
    }
}