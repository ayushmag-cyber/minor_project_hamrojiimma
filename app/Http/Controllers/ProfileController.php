<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'nullable',
        'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $user = User::findOrFail(Auth::id());

    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;

    if ($request->hasFile('profile_photo')) {

        $image = time().'.'.$request->profile_photo->extension();

        $request->profile_photo->move(
            public_path('profile_photos'),
            $image
        );

        $user->profile_photo = $image;
    }

    $user->save();

    return back()->with('success', 'Profile Updated Successfully!');
}
}