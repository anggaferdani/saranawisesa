<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoggedInStatusCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->has('compro')){
            if(auth()->user()->level == 'superadmin'){
                return redirect()->route('compro.superadmin.dashboard');
            }elseif(auth()->user()->level == 'admin'){
                return redirect()->route('compro.admin.dashboard');
            }elseif(auth()->user()->level == 'creator'){
                return redirect()->route('compro.creator.dashboard');
            }elseif(auth()->user()->level == 'helpdesk'){
                return redirect()->route('compro.helpdesk.dashboard');
            }
            return back();
        }elseif(session()->has('eproc')){
            if(auth()->user()->level == 'superadmin'){
                return redirect()->route('eproc.superadmin.dashboard');
            }elseif(auth()->user()->level == 'admin'){
                return redirect()->route('eproc.admin.dashboard');
            }elseif(auth()->user()->level == 'perusahaan'){
                return redirect()->route('eproc.beranda');
            }
            return back();
        }
        return $next($request);
    }
}
