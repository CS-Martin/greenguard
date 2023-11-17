<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // User is logged in, proceed with the request
            return $next($request);
        }

        // User is not logged in, redirect to login or perform another action
        return redirect()->route('login');
    }
}
