<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || (Auth::check() && Auth::user()->user_type !== 'admin')) {
            \Log::warning('Non-admin blocked from admin route: ' . (Auth::check() ? Auth::user()->email : 'Guest'));
            return redirect()->route('user.dashboard')->with('error', 'You do not have admin access.');
        }
        return $next($request);
    }
}