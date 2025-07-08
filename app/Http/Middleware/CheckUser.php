<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->user_type === 'admin') {
            \Log::warning('Admin blocked from user dashboard: ' . Auth::user()->email);
            return redirect()->route('admin.dashboard')->with('error', 'Admins cannot access the user dashboard.');
        }
        return $next($request);
    }
}