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
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalServices = Service::count();
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status','Pending')->count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalServices',
            'totalBookings',
            'pendingBookings'
        ));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function bookings()
    {
        $bookings = Booking::with(['user','service'])->get();
        return view('admin.bookings', compact('bookings'));
    }

    public function services()
    {
        $services = Service::all();
        return view('admin.services', compact('services'));
    }

    public function createService()
    {
        return view('admin.create-service');
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'service_name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'status'=>'required',
            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $service = new Service();

        $service->service_name = $request->service_name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->status = $request->status;

        if($request->hasFile('image')){
            $image = time().'.'.$request->image->extension();

            $request->image->move(
                public_path('images'),
                $image
            );

            $service->image = 'images/'.$image;
        }

        $service->save();

        return back()->with('success','Service added successfully!');
    }

    public function editService($id)
    {
        $service = Service::findOrFail($id);

        return view('admin.edit-service', compact('service'));
    }

    public function updateService(Request $request,$id)
    {
        $service = Service::findOrFail($id);

        $service->service_name = $request->service_name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->status = $request->status;

        if($request->hasFile('image')){
            $image = time().'.'.$request->image->extension();

            $request->image->move(
                public_path('images'),
                $image
            );

            $service->image = 'images/'.$image;
        }

        $service->save();

        return redirect('/admin/services')
            ->with('success','Service updated successfully!');
    }

    public function deleteService($id)
    {
        $service = Service::findOrFail($id);

        $service->delete();

        return back()->with('success','Service deleted successfully!');
    }

   public function reviews()
{
    $reviews = Review::latest()->get();

    return view('admin.reviews', compact('reviews'));
}


public function deleteReview($id)
{
    $review = Review::findOrFail($id);

    $review->delete();

    return back()->with('success','Review deleted successfully!');
}
public function updateProfile(Request $request)
{
    $request->validate([
        'name'=>'required',
        'email'=>'required|email',
    ]);

    $user = Auth::user();

    $user->name = $request->name;
    $user->email = $request->email;

    $user->save();

    return back()->with('success','Profile updated successfully!');
}


public function updatePassword(Request $request)
{
    $request->validate([
        'current_password'=>'required',
        'new_password'=>'required|min:6|confirmed',
    ]);

    $user = Auth::user();

    if(!Hash::check($request->current_password, $user->password))
    {
        return back()->with('error','Current password is incorrect.');
    }

    $user->password = Hash::make($request->new_password);

    $user->save();

    return back()->with('success','Password updated successfully!');
}
public function changeServiceStatus($id)
{
    $service = \App\Models\Service::findOrFail($id);

    if($service->status == "Available")
    {
        $service->status = "Unavailable";
    }
    else
    {
        $service->status = "Available";
    }

    $service->save();

    return redirect('/admin/services');
}
}