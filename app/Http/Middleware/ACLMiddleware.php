<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;
use Illuminate\Support\Facades\Auth;

class ACLMiddleware
{
	/**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $acl)
    {
    	if($request['user']) {
			$role = $request['user']['role'];

			if($acl === $role->level) {
				return $next($request);
			}
		}

    	return response()->json([
    		'message' => 'Forbidden, unauthorized access level'
		], 403);
    }
}
