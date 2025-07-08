<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showAdminRegisterForm()
    {
        return view('auth.register-admin');
    }

    public function registerAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_type' => 'admin',
            'password' => Hash::make($request->password),
            'is_approved' => true, // Admins are auto-approved
        ]);

        return redirect()->route('login')->with('success', 'Admin registration successful. Please log in.');
    }

    public function showUserRegisterForm()
    {
        return view('auth.register-user');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'user_type' => 'required|in:parent,student',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_type' => $request->user_type,
            'password' => Hash::make($request->password),
            'is_approved' => false, // Users are not approved by default
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Waiting for admin approval.');
    }
}