<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class userRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $is_admin)
    {
        $user = $request->user();
        return $next($request);
        // if ($user && $user->is_admin != 0) {

        // }else {
        //     return redirect('/login');
        // }
        // abort(403, 'Unauthorized');
    }
}
