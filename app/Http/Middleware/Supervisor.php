<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Supervisor
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
        if(Auth::check() && Auth::user()->role === "supervisor"){
            return $next($request);
        }elseif(Auth::check() && Auth::user()->role === "admin"){
            return redirect('/admin/dashboard');
        }elseif(Auth::check() && Auth::user()->role === "recept"){
            return redirect('recept/dashboard');
        }elseif(Auth::check() && Auth::user()->role === "poc"){
            return redirect('poc/dashboard');
        }elseif(Auth::check() && Auth::user()->role === "logistic"){
            return redirect('logistic/dashboard');
        }elseif(Auth::check() && Auth::user()->role === "encoder"){
            return redirect('encoder/dashboard');
        }else{
            return redirect('/');
        }
        
    }
}
