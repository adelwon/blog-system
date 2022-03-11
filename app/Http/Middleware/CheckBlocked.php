<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckBlocked
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return RedirectResponse|mixed
     */

    public function handle(Request $request, Closure $next): mixed
    {
        if (auth()->check() && date('Y-m-d H:i:s') < auth()->user()->blocked_date) {
            $blocked_days = now()->DiffInDays(auth()->user()->blocked_date);

            if ($blocked_days === 0) {
                $message = 'Your account has been blocked. It will be unblocked tomorrow!';
            } else {
                $message = 'Your account has been blocked. It will be unblocked after ' . $blocked_days . ' ' . Str::plural('day', $blocked_days) . '!';
            }
            auth()->logout();

            return redirect()->route('login')->with('blocked', $message);
        }

        return $next($request);
    }
}
