<?php

namespace App\Http\Middleware;

use Closure;

class NotStatus
{
    private $AuthNotStatus;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->status != 'A')
            return $next($request);

        return redirect()->route('login')->with('error','Vaya al parecer no puedes acceder mas');
    }
}
