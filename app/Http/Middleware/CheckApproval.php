<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckApproval
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->user_type !== 'admin' && !Auth::user()->is_approved) {
            if ($request->route()->getName() !== 'user.waiting') {
                \Log::info('Unapproved non-admin redirected: ' . Auth::user()->email);
                return redirect()->route('user.waiting')->with('info', 'Your account is awaiting admin approval.');
            }
        }
        return $next($request);
    }
}