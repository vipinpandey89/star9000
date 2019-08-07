<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\User;
use Closure;

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
       if(Auth::user() && (Auth::user()->role_type=='1' || Auth::user()->role_type=='2' || Auth::user()->role_type=='3'))
        {
            return $next($request);

        }else{
            return redirect('/');
        }
    }
}
