<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Influencer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->type !=='influencer'){
            return abort(404,'شما دست رسی ندارید');
        }
        return $next($request);
    }
}
