<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TandaDaftarUsaha;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class TandaDaftarUsahaController extends Controller
{
    public function edit($user_id){
        $user = User::find(Crypt::decrypt($user_id));
        $tanda_daftar_usaha = TandaDaftarUsaha::where('user_id', Crypt::decrypt($user_id))->first();
        return view('eproc.tanda-daftar-usaha.edit', compact(
            'user',
            'tanda_daftar_usaha',
        ));
    }

    public function update(Request $request, $user_id){
        $tanda_daftar_usaha = TandaDaftarUsaha::where('user_id', Crypt::decrypt($user_id))->first();
        
        $tanda_daftar_usaha->update([
            'surat_izin_usaha' => $request->surat_izin_usaha,
            'masa_berlaku_izin_usaha' => $request->masa_berlaku_izin_usaha,
            'instansi_pemberi_izin_usaha' => $request->instansi_pemberi_izin_usaha,
            'no_tanda_daftar_usaha' => $request->no_tanda_daftar_usaha,
            'kualifikasi_usaha' => $request->kualifikasi_usaha,
            'klasifikasi_usaha' => $request->klasifikasi_usaha,
        ]);

        return back()->with('success', 'Data has been updated at '.$tanda_daftar_usaha->created_at);
    }
}
