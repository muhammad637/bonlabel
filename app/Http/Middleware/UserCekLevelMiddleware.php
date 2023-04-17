<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCekLevelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $cekLevel)
    {
        if (Auth::check() && auth()->user()->cekLevel == $cekLevel) {
            # code...
            (auth()->user()->status == 'aktif') ? $check = $next($request) : $check = redirect(route('logNonaktif'));
            return $check;
        }

        return abort(403);   
    }
}
