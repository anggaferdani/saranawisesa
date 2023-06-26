<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if(!$request->expectsJson()){
            if($request->routeIs('compro.*')){
                session()->flash('fail', 'You must log in first');
                return route('compro.login', ['fail' => true, 'return_url' => URL::current()]);
            }elseif($request->routeIs('eproc.*')){
                session()->flash('fail', 'You must log in first');
                return route('eproc.login', ['fail' => true, 'return_url' => URL::current()]);
            }
        }
    }
}
