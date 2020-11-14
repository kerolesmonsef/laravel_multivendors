<?php

namespace App\Http\Middleware;

use Closure;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session('locale')) {
            app()->setLocale(session('locale'));
        }
//        dd(app()->getLocale());
        return $next($request);
    }
}
