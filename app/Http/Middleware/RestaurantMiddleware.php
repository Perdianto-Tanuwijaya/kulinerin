<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role == '1') {
                return redirect()->route('customerDashboard')->withErrors("You Don't Have Access.");
            }
            elseif (Auth::user()->role == '3') {
                return redirect()->route('adminDashboard')->withErrors("You Don't Have Access.");
            }
        } else {
            return redirect()->route('login')->withErrors('Please log in to access this page.');
            // return redirect('/login')->with('Please log in to access this page.');
        }

        return $next($request);
    }
}
