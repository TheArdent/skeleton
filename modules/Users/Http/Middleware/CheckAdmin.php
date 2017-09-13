<?php

namespace Modules\Users\Http\Middleware;

use Closure;

class CheckAdmin
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
    	if ( $request->user() && $request->user()->hasRole('admin'))
	        return $next($request);
    	else return abort(401, 'Access Denied');
    }
}
