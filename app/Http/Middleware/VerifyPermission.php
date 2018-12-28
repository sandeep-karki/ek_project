<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Foundation\Testing\HttpException;
use Illuminate\Support\Facades\Auth;

class VerifyPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$permission,$guard="web")
    {

        if($permission=='change_password'){
            $permission = 'edit';
        }

        if($permission=='udpatepercentage'){
            $permission = 'edit';
        }

        if (\Request::isMethod('delete'))
        {
            $permission = "destroy";

        }elseif(\Request::isMethod('put') || \Request::isMethod('patch'))
        {
            $permission = "edit";
        }elseif(is_numeric($permission))
        {
            $permission = "edit";
        }




        if (Auth::guard()->check() &&
            Auth::guard()->user()->canDo($permission)) {
            return $next($request);
        }
        abort(403, 'Unauthorized action.');

//        return $next($request);
    }
}
