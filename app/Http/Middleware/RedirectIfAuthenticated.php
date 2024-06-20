<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Redirect based on user role
                $role = Auth::user()->role;
                switch ($role) {
                    case 'admin':
                        return redirect()->route('admin.dashboard.index');
                    case 'penulis':
                        return redirect()->route('penulis.dashboard.index');
                    case 'user':
                        return redirect()->route('user.dashboard.index');
                    default:
                        Auth::logout();
                        return redirect(route('auth.index'))->with('pesan', 'Role tidak dikenali.');
                }
            }
        }

        return $next($request);
    }
}
