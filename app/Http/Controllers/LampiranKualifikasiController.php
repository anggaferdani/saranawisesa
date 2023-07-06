<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\LampiranKualifikasi;
use Illuminate\Support\Facades\Crypt;

class LampiranKualifikasiController extends Controller
{
    public function edit($user_id){
        $user = User::find(Crypt::decrypt($user_id));
        $lampiran_kualifikasi = LampiranKualifikasi::where('user_id', Crypt::decrypt($user_id))->first();
        return view('eproc.lampiran-kualifikasi.edit', compact(
            'user',
            'lampiran_kualifikasi',
        ));
    }

    public function update(Request $request, $user_id){
        $lampiran_kualifikasi = LampiranKualifikasi::where('user_id', Crypt::decrypt($user_id))->first();

        if($bukti_kepemilikan_tempat_usaha = $request->file('bukti_kepemilikan_tempat_usaha')){
            $destination_path = 'eproc/lampiran-kualifikasi/bukti-kepemilikan-tempat-usaha/';
            $bukti_kepemilikan_tempat_usaha0002 = date('YmdHis').rand(999999999, 9999999999).$bukti_kepemilikan_tempat_usaha->getClientOriginalName();
            $bukti_kepemilikan_tempat_usaha->move($destination_path, $bukti_kepemilikan_tempat_usaha0002);
            $array['bukti_kepemilikan_tempat_usaha'] = $bukti_kepemilikan_tempat_usaha0002;
        }

        if($surat_izin_usaha = $request->file('surat_izin_usaha')){
            $destination_path = 'eproc/lampiran-kualifikasi/surat-izin-usaha/';
            $surat_izin_usaha0002 = date('YmdHis').rand(999999999, 9999999999).$surat_izin_usaha->getClientOriginalName();
            $surat_izin_usaha->move($destination_path, $surat_izin_usaha0002);
            $array['surat_izin_usaha'] = $surat_izin_usaha0002;
        }

        if($surat_izin_lainnya = $request->file('surat_izin_lainnya')){
            $destination_path = 'eproc/lampiran-kualifikasi/surat-izin-lainnya/';
            $surat_izin_lainnya0002 = date('YmdHis').rand(999999999, 9999999999).$surat_izin_lainnya->getClientOriginalName();
            $surat_izin_lainnya->move($destination_path, $surat_izin_lainnya0002);
            $array['surat_izin_lainnya'] = $surat_izin_lainnya0002;
        }

        if($bukti_laporan_pajak_tahun_terakhir = $request->file('bukti_laporan_pajak_tahun_terakhir')){
            $destination_path = 'eproc/lampiran-kualifikasi/bukti-laporan-pajak-tahun-terakhir/';
            $bukti_laporan_pajak_tahun_terakhir0002 = date('YmdHis').rand(999999999, 9999999999).$bukti_laporan_pajak_tahun_terakhir->getClientOriginalName();
            $bukti_laporan_pajak_tahun_terakhir->move($destination_path, $bukti_laporan_pajak_tahun_terakhir0002);
            $array['bukti_laporan_pajak_tahun_terakhir'] = $bukti_laporan_pajak_tahun_terakhir0002;
        }

        if($bukti_status_kepemilikan_fasilitas = $request->file('bukti_status_kepemilikan_fasilitas')){
            $destination_path = 'eproc/lampiran-kualifikasi/bukti-status-kepemilikan-fasilitas/';
            $bukti_status_kepemilikan_fasilitas0002 = date('YmdHis').rand(999999999, 9999999999).$bukti_status_kepemilikan_fasilitas->getClientOriginalName();
            $bukti_status_kepemilikan_fasilitas->move($destination_path, $bukti_status_kepemilikan_fasilitas0002);
            $array['bukti_status_kepemilikan_fasilitas'] = $bukti_status_kepemilikan_fasilitas0002;
        }

        $lampiran_kualifikasi->update($array);

        return back()->with('success', 'Data has been updated at '.$lampiran_kualifikasi->created_at);
    }
}
