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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        // Check if the user is authenticated and an admin
        if(session()->has('admin_data') && session('admin_data.role') === 'Admin') {
            return $next($request);
        }

        // Redirect to login if not authenticated or not an admin
        return redirect()->route('/')->with('error', 'You do not have admin access.');
    }
}
