<?php

namespace App\Http\Middleware;

use Closure;

class Writer
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
        if(auth()->user()->is_writer == 1){
            return $next($request);
        }

        return redirect('/')->with('error',"Only a writer can access!");
    }
}
