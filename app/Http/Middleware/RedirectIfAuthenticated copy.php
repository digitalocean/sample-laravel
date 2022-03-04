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

        switch($guard){
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect('admin/home');

                    //return redirect(RouteServiceProvider::HOME);
                    }
                    break;
                    case 'web':
                        if (Auth::guard($guard)->check()) {
                            return redirect('admin/home');
        
                            //return redirect(RouteServiceProvider::HOME);
                            }
                            break;
            default:

            return $next($request);

               /* if (Auth::guard($guard)->check()) {
                    return redirect('pass/examhall');

                    //return redirect(RouteServiceProvider::HOME);
                    }                    
                    else{return redirect(RouteServiceProvider::HOME);}
         */
                break;
            }
/*
        switch($guard){
            case 'admin':
                    return redirect('admin/home');
                break;
                default:
            return redirect('map/home');
                break;
            }*/
        /*
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }*/

        return $next($request);
    }
}
