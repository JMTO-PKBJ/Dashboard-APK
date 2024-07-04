<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            // Get the authenticated user
            $user = JWTAuth::parseToken()->authenticate();

             // Determine the route action
            $routeAction = $request->route()->getActionMethod();

              // Check user permissions based on role
            switch ($user->role_id) {
                case 1: // Admin
                    return $next($request);
                case 2: // Supervisor
                    if (in_array($routeAction, ['index','update'])) {
                        return $next($request);
                    }
                    break;
                case 3: // Operator
                    if (in_array($routeAction, ['index'])) {
                        return $next($request);
                    }
                    break;
                default:
                    return response()->json(['error' => 'Unauthorized'], 403);
            }
            
            // // Check if the user is an admin
            // if ($user && $user->role_id == 1) {
            //     return $next($request);
            // }

            return response()->json(['error' => 'Unauthorized'], 403);
        } catch (Exception $e) {
            return response()->json(['error' => 'Token not provided or invalid'], 403);
        }
    }

}
