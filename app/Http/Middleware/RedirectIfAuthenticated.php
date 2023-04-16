<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if(session()->has('compro')){
                if(Auth::guard($guard)->check() && Auth::user()->level == 'superadmin'){
                    return redirect()->route('compro.superadmin.dashboard');
                }elseif(Auth::guard($guard)->check() && Auth::user()->level == 'admin'){
                    return redirect()->route('compro.admin.dashboard');
                }elseif(Auth::guard($guard)->check() && Auth::user()->level == 'creator'){
                    return redirect()->route('compro.creator.dashboard');
                }elseif(Auth::guard($guard)->check() && Auth::user()->level == 'helpdesk'){
                    return redirect()->route('compro.helpdesk.dashboard');
                }else{
                    return back()->route('compro.login');
                }
            }else{
                return back()->route('compro.login');
            }

            if(session()->has('eproc')){
                if(Auth::guard($guard)->check() && Auth::user()->level == 'superadmin'){
                    return redirect()->route('eproc.superadmin.dashboard');
                }elseif(Auth::guard($guard)->check() && Auth::user()->level == 'admin'){
                    return redirect()->route('eproc.admin.dashboard');
                }else{
                    return back()->route('eproc.login');
                }
            }else{
                return back()->route('eproc.login');
            }
        }

        return $next($request);
    }
}
