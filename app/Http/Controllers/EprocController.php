<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
                    }elseif(auth()->user()->level == 'perusahaan'){
                        if(auth()->user()->email_has_been_verified == 1){
                            $request->session()->put('eproc', $credentials);
                            return redirect()->route('eproc.pengadaan');
                        }else{
                            return redirect()->back()->with('fail', 'Akun yang digunakan belum verifikasi');
                        }
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

    public function postregister(Request $request){
        $this->validate($request, [
            'nama_panjang' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $input_array_perusahaan = array(
            'nama_panjang' => $request['nama_panjang'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'level' => 'perusahaan',
        );

        $perusahaan = User::create($input_array_perusahaan);
        $user_id = $perusahaan->id;

        $token = $user_id.hash('sha256', Str::random(120));
        $verifiy_url = route('eproc.verify', ['token' => $token, 'service' => 'email_verification', 'user_id' => $user_id]);

        VerifyEmail::create([
            'user_id' => $user_id,
            'token' => $token,
        ]);

        $message = 'Kepada <br>'.$request->nama_panjang.'</b>';
        $message = 'Terima kasih telah mendaftar, Kami hanya perlu anda memverifikasi alamat email anda untuk menyelesaikan penyiapan akun anda.';

        $mail_data = [
            'recipient' => $request->email,
            'from_email' => 'saranawisesa@gmail.com',
            'from_nama' => 'SARANAWISESA',
            'subject' => 'Email Verification',
            'body' => $message,
            'action_link' => $verifiy_url,
        ];

        Mail::send('email-template', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
            ->from($mail_data['from_email'], $mail_data['from_nama'])
            ->subject($mail_data['subject']);
        });

        if($perusahaan){
            return redirect()->back()->with('success', 'Harus melakukan verifikasi email terlebih dahulu. Link verifikasi telah dikirim, cek email.');
        }else{
            return redirect()->back()->with('fail', 'Terdapat kesalahan saat melakukan registrasi');
        }
    }

    public function verify(Request $request){
        $token = $request->token;
        $user_id = $request->user_id;
        $verify_email = VerifyEmail::where('token', $token)->first();
        if(!is_null($verify_email)){
            $user = $verify_email->users;

            if(!$user->email_has_been_verified){
                $verify_email->users->email_has_been_verified = 1;
                $verify_email->users->save();

                return view('pages.authentications.eproc.pelengkapan-lampiran-perusahaan', ['user_id' => $user_id]);
            }else{
                return view('pages.authentications.eproc.pelengkapan-lampiran-perusahaan', ['user_id' => $user_id]);
            }
        }
    }

    public function logout(){
        if(session()->has('eproc')){
            session()->forget('eproc');
            Auth::guard('web')->logout();
            return redirect()->route('eproc.login');
        }
    }
}
