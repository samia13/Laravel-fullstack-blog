<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthResource
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $modal)
    {
        $resource = $request->route()->parameters()[$modal];
        if( $resource && $resource->user_id != auth()->id() ){
            abort(403);
        }
        return $next($request);
    }
}
