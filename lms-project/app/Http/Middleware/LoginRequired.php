<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginRequired
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
           return redirect()->route('login')->with('login_required', true);

        }

        return $next($request);
    }
}
