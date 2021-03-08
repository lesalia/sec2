<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if (auth()->check())
        {
            if (auth()->user()->estado < 1) {
                //$blocked_days = now()->diffInDays(auth()->user()->email_verified_at);
                $message = 'Lamentamos! A sua conta foi temporariamente Suspensa';
                auth()->logout();
                return redirect()->route('login')->withMessage($message);
            }
        }
        return $next($request);
    }
}
