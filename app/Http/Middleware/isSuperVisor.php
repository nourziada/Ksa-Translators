<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isSuperVisor
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
        if (Auth::user() &&  Auth::user()->admin != 0) {
            return $next($request);
        }else {
            return redirect()->route('index');
        }

        return redirect()->route('admin.index');
    }
}
