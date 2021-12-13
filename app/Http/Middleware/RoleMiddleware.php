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
    public function handle($request, Closure $next, $role1, $role2="")
    {
        if($request->user()->userHasRole($role1) or $request->user()->userHasRole($role2)){
            return $next($request);
        }
        abort('403', 'You are not authorized');
    }
}
