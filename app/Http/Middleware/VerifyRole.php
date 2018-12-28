<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\RolesDeniedException;


class VerifyRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'web')
    {

        if (Auth::guard($guard)->guest()) {

            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('system/login');
            }

        }

        $roles = Auth::guard($guard)->user()->rolesUser->role->pluck('name')->toArray();

        if (!Auth::guard($guard)->user()->hasRoles($roles)) {

            throw new RolesDeniedException($roles);

        }

        return $next($request);
    }
}
