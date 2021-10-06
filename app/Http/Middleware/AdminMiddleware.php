<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('show.login');
        }

        if (!$user->canAccessAdminPanel()) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
