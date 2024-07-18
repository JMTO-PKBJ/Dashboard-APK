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
                    case 1: // admin
                        return redirect('/dashboard');
                    case 2: // supervisor
                        return redirect('/testlog');
                    case 3: // operator
                        return redirect('/testlog');
                    default:
                        return redirect('/');
                }
            }
        }

        return $next($request);
    }
}
