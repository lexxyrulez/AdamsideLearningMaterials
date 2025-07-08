<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!Auth::check()) {
            return view('welcome'); // Default for guests
        }

        // Debug output to verify user details
        \Log::info('Login Redirect: User - ' . Auth::user()->email . ', Type - ' . Auth::user()->user_type . ', Approved - ' . Auth::user()->is_approved);

        if (Auth::user()->user_type === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // For non-admin users (parent/student)
        if (!Auth::user()->is_approved) {
            return redirect()->route('user.waiting');
        }

        return redirect()->route('user.dashboard');
    }

    public function adminDashboard()
    {
        $this->middleware('admin');
        $pendingUsers = \App\Models\User::where('is_approved', false)->where('user_type', '!=', 'admin')->get();
        $users = \App\Models\User::all();
        return view('admin.dashboard', compact('pendingUsers', 'users'));
    }

    public function userDashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->user_type === 'admin') {
            \Log::warning('Admin accessed user dashboard: ' . Auth::user()->email);
            return redirect()->route('admin.dashboard')->with('error', 'Admins cannot access the user dashboard.');
        }
        if (!Auth::user()->is_approved) {
            return redirect()->route('user.waiting');
        }

        $videos = Video::whereNull('deleted_at')->get();
        return view('user.dashboard', compact('videos'));
    }

    public function approveUser($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->update(['is_approved' => true]);
        return redirect()->route('admin.dashboard')->with('success', 'User approved successfully.');
    }
}