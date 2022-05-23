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

            return redirect()->route('login')->with('error', 'Veuillez activer votre compte pour continuer svp. Le lien d\'activation vous a été envoyé par mail.');
        }

        return $next($request);
    }
}
