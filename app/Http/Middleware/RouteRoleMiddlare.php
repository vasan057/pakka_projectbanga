<?php

namespace App\Http\Middleware;

use Closure;

class RouteRoleMiddlare
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
        $url = $request->route()->getPath();
      
        if(\Auth::check() && !$request->isMethod('post')){
            $user = \Auth::user();
            $role_menu = $user->getWebRole;
            $assigned_role = [];
            $menu_link = \App\Library\General::getViews();
            foreach($role_menu as $_role_menu){
                if(isset($menu_link['Website'][$_role_menu->menu])) $assigned_role[] = $menu_link['Website'][$_role_menu->menu];
            }
            \Log::info(json_encode($menu_link));
            if(!in_array($url,$assigned_role)) abort(401);

        }
        return $next($request);
    }
}
