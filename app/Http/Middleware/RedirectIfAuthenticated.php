<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check() && Auth::user()->role_id == 1) {
        //         // return redirect(RouteServiceProvider::HOME);
        //         return redirect()->route('admin.dashboard');
        //     } elseif (Auth::guard($guard)->check() && Auth::user()->role_id == 2) {
        //         return redirect()->route('manager.dashboard');
        //     } elseif (Auth::guard($guard)->check() && Auth::user()->role_id == 3) {
        //         return redirect()->route('user.dashboard');
        //     } else {
        //         return $next($request);
        //     }
        // }


        if (Auth::guard($guard)->check() && Auth::user()->role_id == 1) {
            // return redirect(RouteServiceProvider::HOME);
            // return redirect('/admin/dashboard');
            return redirect()->route('admindashboard');
        } elseif (Auth::guard($guard)->check() && Auth::user()->role_id == 2) {
            // return redirect('/manager/dashboard');
            return redirect()->route('managerdashboard');
        } elseif (Auth::guard($guard)->check() && Auth::user()->role_id == 3) {
            // return redirect('/user/dashboard');
            return redirect()->route('userdashboard');
        }

        return $next($request);
    }
}
