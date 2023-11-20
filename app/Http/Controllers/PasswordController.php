<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function forgot(){
        return view('pages.authentications.eproc.forgot');
    }

    public function postForgot(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $randomNumber = mt_rand(999, 9999999999);
        $randomString = strval($randomNumber);
        $hashedToken = hash('sha256', $randomString);

        $verifiy_url = route('eproc.password.reset', ['email' => $request->email, 'token' => $hashedToken]);

        $message = 'To '.$request->email;
        $message = 'Kami mendapatkan permintaan untuk mereset kata sandi akun Anda. Jika Anda tidak meminta reset password, harap abaikan pesan ini. Pastikan untuk menjaga informasi akun Anda tetap aman dengan tidak memberikan kata sandi kepada siapa pun. Untuk melanjutkan proses reset, klik tautan di bawah ini';

        $mail_data = [
            'recipient' => $request->email,
            'from_email' => 'saranawisesa@gmail.com',
            'from_nama' => 'SARANAWISESA PROPERINDO',
            'subject' => 'Reset Password',
            'body' => $message,
            'action_link' => $verifiy_url,
        ];

        Mail::send('eproc.email.forgot', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
            ->from($mail_data['from_email'], $mail_data['from_nama'])
            ->subject($mail_data['subject']);
        });

        return redirect()->route('eproc.login')->with('success', 'Tautan untuk mereset kata sandi telah berhasil dikirimkan ke alamat email Anda.');
    }

    public function reset($token){
        return view('pages.authentications.eproc.reset');
    }

    public function postReset(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'new_password' => 'required',
            'confirm_new_password' => 'required|same:new_password',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->update([
            'password' => bcrypt($request['new_password']),
        ]);

        return redirect()->route('eproc.login')->with('success', 'Kata sandi Anda telah berhasil diperbarui.');
    }
}
