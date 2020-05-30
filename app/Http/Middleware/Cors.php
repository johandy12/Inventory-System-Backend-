<?php

namespace App\Http\Middleware;

use Closure;

<<<<<<< HEAD
class Cors
{
    public function handle($request, Closure $next) {
        header("Access-Control-Allow-Origin: *");
        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization',
=======
class CORS
{
    public function handle($request, Closure $next) {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'X-Requested-With, Content-Type, X-Auth-Token, Origin, Authorization, Application, Accept',
>>>>>>> f4bf52af6149c2f64808177d2c65f29b02112a2f
        ];
        if($request->getMethod() == "OPTIONS") {
            // The client-side application can set only headers allowed in Access-Control-Allow-Headers
            return response()->json('OK', 200, $headers);
        }
        $response = $next($request);
        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }
        return $response;
    }
}
