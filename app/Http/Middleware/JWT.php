<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;

class JWT
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
        JWTAuth::parseToken()->authenticate(); //check authentication of the user
        return $next($request);
    }
}
