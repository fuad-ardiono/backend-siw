<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;

class JwtGuardMiddleware
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
    	try {
    		$authorization = $request->header('Authorization');

    		if(!$authorization) {
    			return response()->json([
    				'message' => 'Token must provided'
				]);
			}

    		$user = JWT::decode($authorization, env('APP_KEY'), ['HS256']);
    		$request['user'] = (array) $user;

			return $next($request);
		} catch (\Exception $err) {
    		var_dump($err->getMessage());
			return response()->json([
				'message' => 'Invalid token or token expired'
			]);
		}
    }
}
