<?php

namespace App\Http\Middleware;

use Closure;

class MoreThanFiftyMiddleware
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

        if ($request->route('pages') > 50) {
            return redirect()->route('showMessage', ['msg'=> 'Переданное значение больше 50']);
        }

        return $next($request);
    }
}
