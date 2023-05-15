<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\Lampiran;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\AdditionalLampiranPengadaan;
use App\Models\Kualifikasi;
use App\Models\Pemenang;

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
        $perusahaan = Perusahaan::with('lampirans')->find($id);
        $pemenang = Pemenang::where('lelang_id', $lelang_id)->first();

        $pemenang->update([
            'perusahaan_id' => $perusahaan->id,
        ]);

        $perusahaan->update([
            'lelang_id' => null,
        ]);

        return back();
    }
}
