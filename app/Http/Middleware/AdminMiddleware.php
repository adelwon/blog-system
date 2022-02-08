<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ((int)auth()->user()->role !== User::SUPER_ADMIN_ROLE){
            abort(404);
        }
        return $next($request);
    }
}
