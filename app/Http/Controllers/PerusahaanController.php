<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Lelang;
use App\Models\Kualifikasi;
use App\Models\Administrasi;
use Illuminate\Http\Request;
use App\Models\DataFasilitas;
use App\Models\DataPersonalia;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\TandaDaftarUsaha;
use App\Models\PengurusBadanUsaha;
use App\Models\SisaKemampuanNyata;
use App\Models\LampiranKualifikasi;
use App\Models\PengalamanPerusahaan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Models\AktaPendirianPerusahaan;
use App\Models\SusunanKepemilikanSaham;
use Illuminate\Support\Facades\Storage;
use App\Models\PekerjaanYangSedangDilaksanakan;

class PerusahaanController extends Controller
{
    public function index(){
        $users = User::where('status_verifikasi', 'terverifikasi')->where('level', 'perusahaan')->where('status_aktif', 'aktif')->latest()->paginate(10);
        return view('pages.perusahaan.index', compact('users'));
    }

    public function destroy($id){
        $user = User::find(Crypt::decrypt($id));

        $user->update([
            'status_aktif' => 'tidak aktif',
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.perusahaan.index')->with('success', 'Data has been deleted at '.$user->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.perusahaan.index')->with('success', 'Data has been deleted at '.$user->created_at);
        }
    }

    public function verifikasi($id){
        $user = User::find(Crypt::decrypt($id));

        $user->update([
            'status_verifikasi2' => 'terverifikasi',
        ]);

        $message = 'Anda telah berhasil diverifikasi. Sekarang Anda dapat mengakses semua fitur dan layanan kami';

        $mail_data = [
            'recipient' => $user->email,
            'from_email' => 'saranawisesa@gmail.com',
            'from_nama' => 'SARANAWISESA PROPERINDO',
            'subject' => 'Akun Anda telah berhasil diverifikasi.',
            'body' => $message,
        ];

        Mail::send('eproc.email.verifikasi2', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
            ->from($mail_data['from_email'], $mail_data['from_nama'])
            ->subject($mail_data['subject']);
        });

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.perusahaan.index')->with('success', 'Data has been verified at '.$user->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.perusahaan.index')->with('success', 'Data has been verified at '.$user->created_at);
        }
    }

    public function batalkanVerifikasi($id){
        $user = User::find(Crypt::decrypt($id));

        $user->update([
            'status_verifikasi2' => 'belum terverifikasi',
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.perusahaan.index')->with('success', 'Data has been unverified at '.$user->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.perusahaan.index')->with('success', 'Data has been unverified at '.$user->created_at);
        }
    }

    public function pdf($id){
        $user = User::find(Crypt::decrypt($id));
        $administrasi = Administrasi::where('user_id', $user->id)->first();
        $akta_pendirian_perusahaans = AktaPendirianPerusahaan::where('user_id', $user->id)->get();
        $pengurus_badan_usahas = PengurusBadanUsaha::where('user_id', $user->id)->get();
        $tanda_daftar_usaha = TandaDaftarUsaha::where('user_id', $user->id)->first();
        $susunan_kepemilikan_sahams = SusunanKepemilikanSaham::where('user_id', $user->id)->get();
        $data_personalias = DataPersonalia::where('user_id', $user->id)->get();
        $data_fasilitasies = DataFasilitas::where('user_id', $user->id)->get();
        $pengalaman_perusahaans = PengalamanPerusahaan::where('user_id', $user->id)->get();
        $pekerjaan_yang_sedang_dilaksanakans = PekerjaanYangSedangDilaksanakan::where('user_id', $user->id)->get();
        $sisa_kemampuan_nyata = SisaKemampuanNyata::where('user_id', $user->id)->first();
        $lampiran_kualifikasi = LampiranKualifikasi::where('user_id', $user->id)->first();
        
        $array = [
            'title' => 'Lampiran Kualifikasi Perusahaan',
            'date' => date('Y/m/d'),
            'user' => $user,
            'administrasi' => $administrasi,
            'akta_pendirian_perusahaans' => $akta_pendirian_perusahaans,
            'pengurus_badan_usahas' => $pengurus_badan_usahas,
            'tanda_daftar_usaha' => $tanda_daftar_usaha,
            'susunan_kepemilikan_sahams' => $susunan_kepemilikan_sahams,
            'data_personalias' => $data_personalias,
            'data_fasilitasies' => $data_fasilitasies,
            'pengalaman_perusahaans' => $pengalaman_perusahaans,
            'pekerjaan_yang_sedang_dilaksanakans' => $pekerjaan_yang_sedang_dilaksanakans,
            'sisa_kemampuan_nyata' => $sisa_kemampuan_nyata,
            'lampiran_kualifikasi' => $lampiran_kualifikasi,
        ];

        $pdf = PDF::loadView('pages.perusahaan.pdf', $array);
        $pdf->set_paper("A4", "potrait");
        $pdf->render();
        file_put_contents(public_path('eproc/lampiran-kualifikasi/lampiran-kualifikasi-perusahaan/lampiran-kualifikasi-perusahaan.pdf'), $pdf->output());
        // return $pdf->download('lampiran-kualifikasi-perusahaan-'.$user->nama_panjang.'.pdf');
        // return $pdf->stream();
    }
}
