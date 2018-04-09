<?php

namespace App\Http\Middleware;

use Closure;

class Mymiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  $param
     * @return mixed
     */
    public function handle($request, Closure $next, $param = null)
    {
        echo $param;
        if ($request->route('pages') < 4) {
            return redirect()->route('showMessage', ['msg'=> 'Переданное значение меньше 4']);
            //return 'Переданное значение меньше 4';
        }


        return $next($request);
    }
}
