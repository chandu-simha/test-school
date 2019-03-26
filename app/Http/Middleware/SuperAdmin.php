<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdmin
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
       // dd(\Route::));
        dd(\Route::routes('super_admin'));
        foreach( \Route::getRoutes() as $route){
    $data = explode('@', $route->getName());
//dd(\Route::middleware('super_admin'));//->gatherMiddleware());
    if(\Route::getCurrentRoute()->getPrefix() == $route->getPrefix() && @$data[1] == "" ){
        echo '<li><a href="'.$route->getPath() .'">'.$data[0].'</a></li>';
    }
}

        $routeCollection = \Route::getRoutes();
        echo "<pre>";
        foreach ($routeCollection as $key => $value) {
            print_r($key);
            print_r($value);die;
        }die;
        if ($request->user()->fk_role_id != 1) {
            return redirect('home');
        }

        return $next($request);
    }
}
