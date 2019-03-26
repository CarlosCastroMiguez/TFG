<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        //Si no esta logueado
        if (!auth()->check()) {
            return redirect('login');
        }
        //Si no es admin
        if (auth()->user()->role != 0) {
            return redirect('calendar')->with('fail', 'Necesitas ser administrador para acceder ahí!');
        }

        return $next($request);    
    }
}
