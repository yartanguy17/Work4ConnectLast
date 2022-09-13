<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->is_activated == false) {
            Auth::logout();

            return redirect()->route('login')->with('error', 'Please activate your account to continue. The activation link has been sent to you by email..');
        }

        return $next($request);
    }
}
