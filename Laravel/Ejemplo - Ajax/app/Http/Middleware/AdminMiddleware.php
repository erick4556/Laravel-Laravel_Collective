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
     * @return mailparse_determine_best_xfer_encoding(fp)
     */
    public function handle($request, Closure $next)
    {   

        if(Auth::User()->email == 'test2@hotmail.com'){
            return $next($request);
        }else{
            return abort(403);
        }

        
    }
}
