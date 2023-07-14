<?php

namespace App\Http\Controllers;

use App\Models\AktaPendirian;
use App\Models\Perusahaan;
use App\Models\SuratIzinUsahaPerdagangan;
use App\Models\SuratKeteranganDomisiliPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokumenController extends Controller
{
    public function index(){
        $perusahaan = Perusahaan::where('user_id', Auth::id())->first();
        $akta_pendirian = AktaPendirian::where('user_id', Auth::id())->first();
        $surat_keterangan_domisili_perusahaan = SuratKeteranganDomisiliPerusahaan::where('user_id', Auth::id())->first();
        $surat_izin_usaha_perdagangan = SuratIzinUsahaPerdagangan::where('user_id', Auth::id())->first();
        return view('eproc.dokumen', compact(
            'perusahaan',
            'akta_pendirian',
            'surat_keterangan_domisili_perusahaan',
            'surat_izin_usaha_perdagangan',
        ));
    }
}
