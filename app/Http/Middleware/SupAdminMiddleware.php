<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class SupAdminMiddleware
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
        $admin = Admin::all()->count();
        if (!($admin == 1)) {
            if (!Auth::guard('admin')->user()->hasPermissionTo('Super Permissions')) { //If user does //not have this permission
                abort('401');
            }
        }

        return $next($request);
    }
}
