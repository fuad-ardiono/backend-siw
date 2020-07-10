<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
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
    	$admin = Auth::guard('admin')->check();

    	if($admin) {
			return $next($request);
		}

    	$resident = Auth::guard('resident')->check();

    	if($resident) {
			return $next($request);
		}

    	return response()->json([
    		'message' => 'Unauthorized access'
		], 401);
    }
}
