<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{

    public function dashboard()
    {
        return view('provider.dashboard');
    }


    public function services()
    {
        $services = Service::all();

        return view('provider.services', compact('services'));
    }


    public function bookings()
    {
        $bookings = Booking::whereNull('provider_id')
            ->whereIn('status', ['Pending','Approved'])
            ->with(['user','service'])
            ->latest()
            ->get();

        return view('provider.bookings', compact('bookings'));
    }


    public function applyBooking($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->provider_id = Auth::id();
        $booking->status = "Approved";

        $booking->save();

        return back()->with('success','Service accepted successfully');
    }


    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = "Cancelled";

        $booking->save();

        return back()->with('success','Booking cancelled successfully');
    }


    public function complete($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = "Completed";

        $booking->save();

        return back()->with('success','Booking completed successfully');
    }


    public function myBookings()
    {
        $bookings = Booking::where('provider_id', Auth::id())
            ->with(['user','service'])
            ->latest()
            ->get();

        return view('provider.my-bookings', compact('bookings'));
    }


    /** Provider Profile */

    public function profile()
    {
        $provider = Auth::user();

        $totalBookings = Booking::where('provider_id', Auth::id())
            ->count();

        $completedBookings = Booking::where('provider_id', Auth::id())
            ->where('status','Completed')
            ->count();

        return view('provider.profile', compact(
            'provider',
            'totalBookings',
            'completedBookings'
        ));
    }


    /** Edit Profile */

    public function editProfile()
    {
        $provider = Auth::user();

        return view('provider.edit-profile', compact('provider'));
    }


    /** Update Profile */

    public function updateProfile(Request $request)
    {
        $provider = Auth::user();

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'profile_photo'=>'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);


        $provider->name = $request->name;
        $provider->email = $request->email;
        $provider->phone = $request->phone;


        if($request->hasFile('profile_photo'))
        {
            $photo = time().'.'.$request->profile_photo->extension();

            $request->profile_photo->move(
                public_path('images/profile'),
                $photo
            );

            $provider->profile_photo = 'images/profile/'.$photo;
        }


        $provider->save();


        return redirect()
            ->route('provider.profile')
            ->with('success','Profile updated successfully');
    }

}