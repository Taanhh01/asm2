<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return $next($request);
            } else {
                return redirect('/')->with('error', 'You do not have admin access.');
            }
        }

        return redirect('/login')->with('error', 'Please login first.');
    }
}
