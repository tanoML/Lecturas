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

            if(auth()->user()->role === 'R')
                return redirect()->route('inicioResponsable');
            elseif(auth()->user()->role === 'E')
                return redirect()->route('inicioDocente');
            elseif(auth()->user()->role === 'S')
                return redirect()->route('inicioStudent');

            //return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
