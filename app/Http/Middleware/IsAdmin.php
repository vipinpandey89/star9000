<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use  View;

class IsAdmin
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
       if(isset(Auth::user()->id))
        {
            if(Auth::user()->role_type=='2'){
                $accessData = \App\UserAccessLevel::where(['user_id'=>Auth::user()->id])->first();
                $menuData = [];
                $menuIds = [];
                if (isset($accessData->access_level)) {
                    $menuData = json_decode($accessData->access_level,true);
                    foreach ($menuData as $mdata) {
                        $menuIds[] = $mdata['id'];
                    }
                    
                };
                $accessibleMenus = \App\NavigationTabs::whereIn('id', $menuIds)->get();
                View::share(['menuData'=>$menuData,'accessibleMenus'=>$accessibleMenus]);
            }
            return $next($request);

        }else{
            return redirect('/');
        }
    }
}
