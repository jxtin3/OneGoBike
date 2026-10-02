<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureGoBiker
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()?->role !== 'GoBiker') {
            abort(403, 'Only Go Bikers can share their location.');
        }

        return $next($request);
    }
}