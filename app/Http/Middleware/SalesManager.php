<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SalesManager
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
        if (auth()->user() &&  auth()->user()->role == "Sales_Manager") {
            return $next($request);
       }
       return response()->json(['message' => 'You are not a sales manager']);
    }
}
