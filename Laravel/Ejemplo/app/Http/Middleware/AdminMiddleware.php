<?php

namespace Ejemplo\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;   //Importar el auth 

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

        if(Auth::User()->email == 'developers@hotmail.com'){
            return $next($request);
        }else{
            return abort(403);
        }

        
    }
}
