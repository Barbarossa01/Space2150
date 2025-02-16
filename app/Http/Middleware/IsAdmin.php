<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user's name is "admin"
        if (Auth::check() && Auth::user()->name === 'admin') {
            return $next($request);
        }

        // Redirect non-admin users to the home page with an error message
        return redirect('/')->with('error', 'You do not have access to this resource.');
    }
}
