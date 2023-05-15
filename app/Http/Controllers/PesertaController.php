<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\Lampiran;
use App\Models\Pemenang;
use App\Models\Perusahaan;
use App\Models\Kualifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\AdditionalLampiranPengadaan;

class PesertaController extends Controller
{
    public function index($lelang_id){
        $lelang = Lelang::find($lelang_id);
        $perusahaan = Perusahaan::with('users')->get();
        $pemenang = Pemenang::where('lelang_id', $lelang_id)->first();
        return view('pages.peserta.index', compact('lelang', 'perusahaan', 'pemenang'));
    }

    public function show($lelang_id, $id){
        $lelang = Lelang::find($lelang_id);
        $perusahaan = Perusahaan::with('lampirans')->find($id);
        $lampiran = Lampiran::where('lelang_id', $lelang_id)->where('perusahaan_id', $id)->first();
        $kualifikasi = Kualifikasi::where('perusahaan_id', $id)->first();
        return view('pages.peserta.show', compact('lelang', 'perusahaan', 'lampiran', 'kualifikasi'));
    }

    public function pemenang($lelang_id, $id){
        $lelang = Lelang::find($lelang_id);
        $perusahaan = Perusahaan::with('lampirans', 'users')->find($id);
        $pemenang = Pemenang::where('lelang_id', $lelang_id)->first();
        $kualifikasi = Kualifikasi::where('perusahaan_id', $perusahaan->id)->first();

        $pemenang->update([
            'perusahaan_id' => $perusahaan->id,
        ]);

        $perusahaan->update([
            'lelang_id' => null,
        ]);

        $verifiy_url = route('eproc.pengadaan');
        $message = 'Kepada <br>'.$kualifikasi->administrasi_nama_badan_usaha.'</b>';
        $message = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, omnis laborum in quidem consequuntur at nostrum saepe atque, deserunt non sequi sit totam iure dolores eos ipsam fugit aperiam odio.';

        $mail_data = [
            'recipient' => $perusahaan->users->email,
            'from_email' => 'saranawisesa@gmail.com',
            'from_nama' => 'SARANAWISESA',
            'subject' => 'Pemenang Lelang '.$lelang->nama_lelang,
            'body' => $message,
            'action_link' => $verifiy_url,
        ];

        Mail::send('email-pemenang-lelang-template', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
            ->from($mail_data['from_email'], $mail_data['from_nama'])
            ->subject($mail_data['subject']);
        });

        return back();
    }
}
