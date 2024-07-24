<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                switch (Auth::user()->role_id) {
                    case 1: 
                        return redirect('/admin/dashboard');
                    case 2: 
                        return redirect('/supervisor/dashboard');
                    case 3: 
                        return redirect('/operator/dashboard');
                    default:
                        return redirect('/');
                }
            }
        }

        return $next($request);
    }
}
