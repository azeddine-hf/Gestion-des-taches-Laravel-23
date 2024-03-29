<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SuperAdminMiddleware
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
        if (!Gate::allows('isSuperAdmin')) {
            // abort(403, 'Unauthorized');
            return new Response(view('errors.error403'), 403);
        }
        return $next($request);
    }
}
