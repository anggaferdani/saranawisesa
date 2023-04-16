<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComproController extends Controller
{
    public function login(){
        return view('pages.compro.authentications.login');
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
            if(session()->has('eproc')){
                session()->forget('eproc');
                return $request->next;
            }elseif(!session()->has('eproc')){
                if(auth()->user()->status_aktif == 'aktif'){
                    if(auth()->user()->level == 'superadmin'){
                        $request->session()->put('compro', $credentials);
                        return redirect()->route('compro.superadmin.dashboard');
                    }elseif(auth()->user()->level == 'admin'){
                        $request->session()->put('compro', $credentials);
                        return redirect()->route('compro.admin.dashboard');
                    }elseif(auth()->user()->level == 'creator'){
                        $request->session()->put('compro', $credentials);
                        return redirect()->route('compro.creator.dashboard');
                    }elseif(auth()->user()->level == 'helpdesk'){
                        $request->session()->put('compro', $credentials);
                        return redirect()->route('compro.helpdesk.dashboard');
                    }else{
                        return redirect()->route('compro.login')->with('fail', 'Level akun yang digunakan untuk login tidak sesuai');
                    }
                }elseif(auth()->user()->status_aktif == 'tidak_aktif'){
                    if(session()->has('eproc')){
                        session()->forget('eproc');
                        Auth::guard('web')->logout();
                        return redirect()->route('compro.login')->with('fail', 'Status akun yang digunakan untuk login tidak aktif');
                    }elseif(!session()->has('eproc')){
                        Auth::guard('web')->logout();
                        return redirect()->route('compro.login')->with('fail', 'Status akun yang digunakan untuk login tidak aktif');
                    }
                }else{
                    return redirect()->route('compro.login')->with('fail', 'Status akun yang digunakan untuk login tidak aktif');
                }
            }
        }else{
            return redirect()->route('compro.login')->with('fail', 'Email/Password yang digunakan untuk login salah. Coba lagi');
        }
    }

    public function logout(){
        if(session()->has('compro')){
            session()->forget('compro');
            Auth::guard('web')->logout();
            return redirect()->route('compro.login');
        }
    }
}
