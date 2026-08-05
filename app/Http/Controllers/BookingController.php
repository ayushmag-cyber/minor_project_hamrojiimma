<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    // Show Booking Page
    public function create(Request $request)
{
    $services = Service::all();

    $selectedService = $request->service;

    return view('booking', compact('services', 'selectedService'));
}

    // Store Booking
    public function store(Request $request)
    {
        $request->validate([

            'service_id' => 'required',
            'payment_method' => 'required|string',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required',
            'address' => 'required|string',

        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'status' => 'Pending',
        ]);

        return redirect('/my-bookings')
                ->with('success','Booking submitted successfully!');
    }

    // Admin Approve Booking
    public function approve($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status'=>'Approved'
        ]);


        return back()
        ->with('success','Booking Approved!');
    }

    // Admin Complete Booking
    public function complete($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status'=>'Completed'
        ]);

        return back()
        ->with('success','Booking Completed!');
    }

    // Admin Cancel Booking
    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status'=>'Cancelled'
        ]);

        return back()
        ->with('success','Booking Cancelled!');
    }

}