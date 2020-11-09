<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() and auth()->user()->isAdmin()) {
            return $next($request);
        }
        return redirect()->route('admin.login');
    }
}
