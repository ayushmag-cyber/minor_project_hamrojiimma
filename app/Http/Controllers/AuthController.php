<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        // Automatically detect provider account
        if (str_ends_with($request->email, '@provider.com')) {
            $role = 'provider';
        } else {
            $role = 'user';
        }

        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => $role,
        ]);

        return redirect('/login')
            ->with('success', 'Registration successful!');
    }

    public function login(Request $request)
   {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Admin
            if ($user->role == 'admin') {
                return redirect('/admin');
            }

            // Service Provider
            if ($user->role == 'provider') {
                return redirect('/provider');
            }

            // Normal User
            return redirect('/dashboard');
        }

        return back()
            ->with('error', 'Invalid email or password');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}