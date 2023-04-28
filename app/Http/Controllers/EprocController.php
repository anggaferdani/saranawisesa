<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EprocController extends Controller
{
    public function login(){
        return view('pages.authentications.eproc.login');
    }

    public $email, $password;

    public function postlogin(Request $request){
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        $credentials = array(
            'email' => $input['email'],
            'password' => $input['password'],
        );

        if(Auth::guard('web')->attempt($credentials)){
            if(session()->has('compro')){
                session()->forget('compro');
                return $request->next;
            }elseif(!session()->has('compro')){
                if(auth()->user()->status_aktif == 'aktif'){
                    if(auth()->user()->level == 'superadmin'){
                        $request->session()->put('eproc', $credentials);
                        return redirect()->route('eproc.superadmin.dashboard');
                    }elseif(auth()->user()->level == 'admin'){
                        $request->session()->put('eproc', $credentials);
                        return redirect()->route('eproc.admin.dashboard');
                    }else{
                        return redirect()->route('eproc.login')->with('fail', 'Level akun yang digunakan untuk login tidak sesuai');
                    }
                }elseif(auth()->user()->status_aktif == 'tidak_aktif'){
                    if(session()->has('compro')){
                        session()->forget('compro');
                        Auth::guard('web')->logout();
                        return redirect()->route('eproc.login')->with('fail', 'Status akun yang digunakan untuk login tidak aktif');
                    }elseif(!session()->has('compro')){
                        Auth::guard('web')->logout();
                        return redirect()->route('eproc.login')->with('fail', 'Status akun yang digunakan untuk login tidak aktif');
                    }
                }else{
                    return redirect()->route('eproc.login')->with('fail', 'Status akun yang digunakan untuk login tidak aktif');
                }
            }
        }else{
            return redirect()->route('eproc.login')->with('fail', 'Email/Password yang digunakan untuk login salah. Coba lagi');
        }
    }

    public function register(){
        return view('pages.authentications.eproc.register');
    }

    public function logout(){
        if(session()->has('eproc')){
            session()->forget('eproc');
            Auth::guard('web')->logout();
            return redirect()->route('eproc.login');
        }
    }
}
