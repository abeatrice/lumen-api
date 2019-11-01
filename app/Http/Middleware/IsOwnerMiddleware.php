<?php

namespace App\Http\Middleware;

use Closure;

class IsOwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $userId)
    {
        if($request->route($userId) != $request->user()->id) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
