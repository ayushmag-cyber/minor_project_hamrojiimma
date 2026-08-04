<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Review;

class AdminController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalServices = Service::count();
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'Pending')->count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalServices',
            'totalBookings',
            'pendingBookings'
        ));
    }

    // Users
    public function users()
    {
        $users = User::all();

        return view('admin.users', compact('users'));
    }

    // Bookings
    public function bookings()
    {
        $bookings = Booking::with(['user', 'service'])->get();

        return view('admin.bookings', compact('bookings'));
    }

    // Services
    public function services()
    {
        $services = Service::all();

        return view('admin.services', compact('services'));
    }

    // Reviews
    public function reviews()
    {
        $reviews = Review::latest()->get();

        return view('admin.reviews', compact('reviews'));
    }

    // Update Admin Password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully!');
    }
}