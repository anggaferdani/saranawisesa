<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\AktaPendirian;
use App\Models\NomorIndukBerusaha;
use App\Models\NomorPokokWajibPajak;
use App\Models\SuratIzinOperasional;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\SuratIzinUsahaPerdagangan;
use App\Models\SuratKeteranganDomisiliPerusahaan;
use App\Models\SuratPengukuhanPerusahaanKenaPajak;

class DokumenController extends Controller
{
    public function index($user_id){
        $user = User::find(Crypt::decrypt($user_id));
        $perusahaan = Perusahaan::where('user_id', Crypt::decrypt($user_id))->first();
        $akta_pendirian = AktaPendirian::where('user_id', Crypt::decrypt($user_id))->first();
        $surat_keterangan_domisili_perusahaan = SuratKeteranganDomisiliPerusahaan::where('user_id', Crypt::decrypt($user_id))->first();
        $surat_izin_usaha_perdagangan = SuratIzinUsahaPerdagangan::where('user_id', Crypt::decrypt($user_id))->first();
        $nomor_induk_berusaha = NomorIndukBerusaha::where('user_id', Crypt::decrypt($user_id))->first();
        $nomor_pokok_wajib_pajak = NomorPokokWajibPajak::where('user_id', Crypt::decrypt($user_id))->first();
        $surat_pengukuhan_perusahaan_kena_pajak = SuratPengukuhanPerusahaanKenaPajak::where('user_id', Crypt::decrypt($user_id))->first();
        $surat_izin_operasional = SuratIzinOperasional::where('user_id', Crypt::decrypt($user_id))->first();
        return view('eproc.dokumen', compact(
            'user',
            'perusahaan',
            'akta_pendirian',
            'surat_keterangan_domisili_perusahaan',
            'surat_izin_usaha_perdagangan',
            'nomor_induk_berusaha',
            'nomor_pokok_wajib_pajak',
            'surat_pengukuhan_perusahaan_kena_pajak',
            'surat_izin_operasional',
        ));
    }
}
