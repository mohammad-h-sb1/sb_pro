<?php

namespace App\Http\Middleware;

use App\Models\SoldProduct;
use Closure;
use Illuminate\Http\Request;

class Comment
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

     if (SoldProduct::has("product_id",function ($q){$q->whrere('id',auth()->user()->id);}))
     {return $next($request);}
     else{
         return response(403);
     }

    }
}
