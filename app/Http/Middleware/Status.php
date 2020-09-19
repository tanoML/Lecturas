<?php

namespace App\Http\Middleware;

use Closure;

class Status
{
    private $AuthStatus;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $status)
    {
       if( ! $request->user()->hasStatus($status) )
       {
            return redirect()->route('statusMsg')->with('error','Vaya al parecer no puedes acceder mas');
       }

       return $next($request);
        // if(auth()->user()->status === 'A')
        //     return $next($request);
        // elseif(auth()->user()->status != 'A')
        //     return redirect()->route('statusMsg')->with('error','Vaya al parecer no puedes acceder mas');
    //return redirect()->route('login')->with('error','Vaya al parecer no puedes acceder mas');
    }
}
