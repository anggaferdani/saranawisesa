<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lelang;
use App\Models\Lampiran;
use App\Models\Pemenang;
use App\Models\Perusahaan;
use App\Models\UserLelang;
use App\Models\Kualifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Models\AdditionalLampiranPengadaan;

class PesertaController extends Controller
{
    public function index($lelang_id){
        $lelang = Lelang::find(Crypt::decrypt($lelang_id));
        $user_lelangs = $lelang->users()->paginate(10);
        return view('pages.peserta.index', compact('lelang', 'user_lelangs'));
    }

    public function show($lelang_id, $id){
        $lelang = Lelang::find(Crypt::decrypt($lelang_id));
        $user = User::find(Crypt::decrypt($id));
        $lampiran = Lampiran::where('lelang_id', $lelang->id)->where('user_id', $user->id)->first();
        return view('pages.peserta.show', compact('lelang', 'user', 'lampiran'));
    }

    public function pemenang($lelang_id, $id){
        $lelang = Lelang::find(Crypt::decrypt($lelang_id));

        $lelang->update([
            'user_id' => Crypt::decrypt($id),
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.peserta.index', ['lelang_id' => Crypt::encrypt($lelang->id)])->with('success', 'Has appointed '.$lelang->users2->nama_panjang.' company as the winner at '.$lelang->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.peserta.index', ['lelang_id' => Crypt::encrypt($lelang->id)])->with('success', 'Has appointed '.$lelang->users2->nama_panjang.' company as the winner at '.$lelang->created_at);
        }
    }
}
