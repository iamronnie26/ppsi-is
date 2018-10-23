<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class POC
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
        if(Auth::check() && Auth::user()->role === "poc"){
            return $next($request);
        }elseif(Auth::check() && Auth::user()->role === "admin"){
            return redirect('/admin/dashboard');
        }elseif(Auth::check() && Auth::user()->role === "recept"){
            return redirect('recept/dashboard');
        }elseif(Auth::check() && Auth::user()->role === "supervisor"){
            return redirect('supervisor/dashboard');
        }else{
            return redirect('/');
        }
        
    }
}
