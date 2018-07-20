<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminAuthenticate
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
        if ($admin = Session::get('admin.user')) {
            return $next($request);
        }       
        return redirect('/passport/login');
    }
}