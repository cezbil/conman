<?php

namespace App\Http\Middleware;

use App\User;
use App\Concert;
use Illuminate\Support\Facades\Auth;
use Closure;

class RedirectifWrongUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->get("concertId"))
            return redirect('/home');

        if (count(Concert::where('user_id', Auth::id())) != 1)
            return redirect('/home');

        return $next($request);

    }

}

