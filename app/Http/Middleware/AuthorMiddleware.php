<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AuthorMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ((int)auth()->user()->role !== User::AUTHOR_ROLE){
            abort(404);
        }
        return $next($request);
    }
}
