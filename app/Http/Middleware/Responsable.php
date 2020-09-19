<?php

namespace App\Http\Middleware;

use Closure;

class Responsable
{
    private $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $this->auth = auth()->user() ? (auth()->user()->role === 'R') : false;

        if($this->auth === true)
            return $next($request);

        return redirect()->route('login')->with('error','Acceso denied. Login to continue');
        
    }
}
