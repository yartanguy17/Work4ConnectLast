<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */

     public function handle(Request $request, Closure $next, ...$guards)
     {
         $guards = empty($guards) ? [null] : $guards;

         foreach ($guards as $guard) {
             if (Auth::guard($guard)->check()) {
                 return redirect(RouteServiceProvider::HOME);
             }
         }

         return $next($request);
     }

   /* public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect('/admin/dashboard');
        }
        if ($guard == "writer" && Auth::guard($guard)->check()) {
            return redirect('/writer');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/dashboard');
        }

        return $next($request);
    }*/

    /*public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->role_id == 1) {
            return redirect()->route('client.dashboard');
        } elseif(Auth::guard($guard)->check() && Auth::user()->role_id == 2){
            return redirect()->route('prestataire.dashboard');
        } elseif(Auth::guard($guard)->check() && Auth::user()->role_id == 3){
            return redirect()->route('admin.dashboard');
        }else {
            return $next($request);
        }
    }*/
}
