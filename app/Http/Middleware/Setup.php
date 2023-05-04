<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Setup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        foreach(json_decode(Auth('staff')->user()->permission) as $per)
        {
            if($per=="setup")
            {
                return $next($request);
            }
        }
        abort(403);
    }
}
