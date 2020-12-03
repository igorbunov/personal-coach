<?php

namespace App\Http\Middleware;

use App\Models\User;
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
        $currentUserId = (int) $request->header('current_user_id', 0);

        if (empty($token) or empty($currentUserId)) {
            return response()->json([
                'message' => 'Not valid access info'
            ], 401);
        }

        $user = User::find($currentUserId);

        if (empty($user)) {
            return response()->json([
                'message' => 'Wrong user'
            ], 401);
        }

        if ($token != $user->token) {
            return response()->json([
                'message' => 'Wrong token'
            ], 401);
        }

        return $next($request);
    }
}
