<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$roles=null)
    {
        if (Auth::guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
        }else{
            $role = Auth::user()->roles_id;
            $arr = [
                1 => 'admin',
                2 => 'pakka',
                3 => 'facilitator',
                4 => 'ubp'
            ];
            if($roles != null){
                if(!in_array($arr[$role],explode('|',$roles))){
                    if ($request->ajax() || $request->wantsJson()) {
                        return response()->json(['error'=>['Your not authorize person.']]);
                    } else {
                        abort(401);
                    }
                }
            }
        }
        return $next($request);
    }
}
