<?php

namespace App\Http\Middleware;

use Closure;

class Isstudent
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
        if(Auth()->user()->is_admin > 0){
            return $next($request);
        }

        return redirect('/')->with('error',"You don't have member access.");
    }

}
