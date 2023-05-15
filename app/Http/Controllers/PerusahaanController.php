<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kualifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PerusahaanController extends Controller
{
    public function index(){
        $kualifikasi = Kualifikasi::with('perusahaans.users', 'perusahaans')->get();
        return view('pages.perusahaan.index', compact('kualifikasi'));
    }

    public function show($id){
        $kualifikasi = Kualifikasi::with('perusahaans.users', 'perusahaans')->find($id);
        return view('pages.perusahaan.show', compact('kualifikasi'));
    }

    public function verifikasi($id){
        $kualifikasi = Kualifikasi::with('perusahaans.users')->find($id);
        
        $kualifikasi->perusahaans->users->update([
            'email_has_been_verified' => 'terverifikasi',
            'email_verified_at' => Carbon::now(),
        ]);

        $verifiy_url = route('eproc.pengadaan');
        $message = 'Kepada <br>'.$kualifikasi->administrasi_nama_badan_usaha.'</b>';
        $message = 'Akun berhasil terverifikasi pada : '.$kualifikasi->perusahaans->users->email_verified_at.'. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, omnis laborum in quidem consequuntur at nostrum saepe atque, deserunt non sequi sit totam iure dolores eos ipsam fugit aperiam odio.';

        $mail_data = [
            'recipient' => $kualifikasi->perusahaans->users->email,
            'from_email' => 'saranawisesa@gmail.com',
            'from_nama' => 'SARANAWISESA',
            'subject' => 'Email verifikasi hasil kualifikasi',
            'body' => $message,
            'action_link' => $verifiy_url,
        ];

        Mail::send('email-kualifikasi-template', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
            ->from($mail_data['from_email'], $mail_data['from_nama'])
            ->subject($mail_data['subject']);
        });

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.perusahaan.index')->with('success', 'Berhasil terverifikasi pada : '.$kualifikasi->perusahaans->users->email_verified_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.perusahaan.index')->with('success', 'Berhasil terverifikasi pada : '.$kualifikasi->perusahaans->users->email_verified_at);
        }
    }
}
