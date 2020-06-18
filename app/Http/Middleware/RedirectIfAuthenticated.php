<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
           if (Auth::user()->role == "super_admin") {
               return redirect()->route('suAdmin.index');
           }
           else if(Auth::user()->role == "murid") {
               return redirect()->route('murid.index');
           }
           else if(Auth::user()->role = "pengajar") {
                return redirect()->route('guru.index');
           }
        }

        return $next($request);
    }
}
