<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Redirect;
use Illuminate\Http\Request;

class Level
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        if (in_array($request->user()->level, $levels)) {
            return $next($request);
        }

        if (Auth::user()->level = 'gaa') {
            return Redirect::to('home');
        } elseif (Auth::user()->level == 'management') {
            // return Redirect::to('app_asset');
        } elseif (Auth::user()->level == 'general-affair') {
            // return Redirect::to('app_asset');
        }
    }
}
