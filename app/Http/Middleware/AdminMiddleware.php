<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if (Auth::guard('admin')->user()->hasPermissionTo('Admin Permissions')) { //If user has this //permission
            return $next($request);
        }

        return $next($request);
    }
}
