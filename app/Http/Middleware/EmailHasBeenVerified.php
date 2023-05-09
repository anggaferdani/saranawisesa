<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EmailHasBeenVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::guard('web')->user()->email_has_been_verified){
            Auth::guard('web')->logout();
            return redirect()->route('eproc.login')->with('fail', 'Email verifikasi berhasil dikirim silakan cek email kamu')->withInput();
        }
        return $next($request);
    }
}
