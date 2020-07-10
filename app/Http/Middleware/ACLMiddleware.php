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
    	$user = Auth::guard('admin')->check() ?
			Auth::guard('admin')->user() : Auth::guard('resident')->user();

    	if($user) {
			$role = Role::query()->find($user->role_id);

			if($acl === $role->level) {
				return $next($request);
			}
		}

    	return response()->json([
    		'message' => 'Forbidden, unauthorized access level'
		], 403);
    }
}
