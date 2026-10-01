<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Not logged in -> go to the login page
        if (! Auth::check()) {
            if ($request->expectsJson()) {
                abort(401, 'Unauthenticated.');
            }

            return redirect()->guest(route('login'));
        }

        // Logged in but not an admin -> forbidden
        if (! Auth::user()->is_admin) {
            abort(403, 'Access denied.');
        }

        return $next($request);
    }
}