<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StoreManager
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
        if (auth()->user()->role !== 'store_manager'){
            return abort('404','شما دسترسیدندارید');
        }
        return $next($request);
    }
}
