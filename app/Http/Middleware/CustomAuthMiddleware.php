<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CustomAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest() || auth()->user()['role_id'] === 1 || auth()->user()['role_id'] === 4) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
