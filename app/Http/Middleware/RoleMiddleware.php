<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        foreach($roles as $role) {
            if($request->user()->userHasRole($role)) {
                return $next($request);
            }
        }
        return abort('403', 'You are not authorized');
    }
}
