<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class UserAdmin
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
        if (Auth::user() && Auth::user()->role == 'Admin') {
           return $next($request);
        }
        return redirect('home')->with('error','Usted no tiene permisos para ver este contenido');
    }
}
