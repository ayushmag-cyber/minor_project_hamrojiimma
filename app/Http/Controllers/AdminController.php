<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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

    $providers = User::where('role', 'provider')->get();

    return view('admin.bookings', compact('bookings', 'providers'));
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
        $service->about = $request->about;
        $service->included_services = $request->included_services;
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
        $service->about = $request->about;
       $service->included_services = $request->included_services;
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

    $user = User::find(Auth::id());

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

    $user = User::find(Auth::id());


    if(!Hash::check($request->current_password, $user->password))
    {
        return back()->with(
            'error',
            'Current password is incorrect.'
        );
    }


    $user->password = Hash::make($request->new_password);

    $user->save();


    return back()->with(
        'success',
        'Password updated successfully!'
    );
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
public function providers()
{
    $providers = User::where('role','provider')->get();

    return view('admin.providers.index',
    compact('providers'));
}

public function createProvider()
{
    return view('admin.providers.create');
}

public function storeProvider(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'phone' => 'required',
        'password' => 'required|min:6',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make($request->password),
        'role' => 'provider',
    ]);

    return redirect()->route('admin.providers')
        ->with('success', 'Provider added successfully.');
}
}