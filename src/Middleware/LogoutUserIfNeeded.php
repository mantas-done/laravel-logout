<?php

namespace MantasDone\LaravelLogout\Middleware;

use Closure;

class LogoutUserIfNeeded
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
        if (auth()->guest()) {
            return $next($request);
        }

        $older_than_time = auth()->user()->logout_logins_older_than;
        $user_login_time = session()->get('login_time', 0);

        if ($older_than_time && $user_login_time < $older_than_time) {
            auth()->logout();
            session()->forget('login_time');
            return redirect('/');
        }

        return $next($request);
    }
}
