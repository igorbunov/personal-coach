<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AppKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('access_token', '');

        if (empty($token)) {
            return response()->json([
                'message' => 'acess token not found'
            ], 401);
        }

        if ($token != '54hwg34fegqeawfwfwe') {
            return response()->json([
                'message' => 'wrong access token'
            ], 401);
        }

        return $next($request);
    }
}
