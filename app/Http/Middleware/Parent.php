<?php

namespace App\Http\Middleware;

use Closure;

class Parent
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
        if ($request->user()->fk_role_id != 5) {
            return redirect('home');
        }

        return $next($request);
    }
}
