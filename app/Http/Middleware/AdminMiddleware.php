<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to access this page.');
        }

        if (Auth::user()->role !== 'admin') {
            return redirect()->route('customer.dashboard')->with('error', 'Access denied. You do not have administrator privileges.');
        }

        return $next($request);
    }
}
