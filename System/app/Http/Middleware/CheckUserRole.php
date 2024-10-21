<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // If the user is an admin and tries to access /dashboard, redirect to /admin/dashboard
            if (Auth::user()->role === 'admin' && $request->is('dashboard')) {
                return redirect('admin/dashboard');
            }

            // If the user is not an admin, and tries to access an admin route, redirect them to home
            if (Auth::user()->role !== 'admin' && $request->is('admin/*')) {
                return redirect('/'); // Or any other user dashboard, depending on your needs
            }
        }

        return $next($request);
    }
}
