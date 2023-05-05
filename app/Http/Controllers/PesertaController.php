<?php

namespace App\Http\Controllers;

use App\Models\AdditionalLampiranPengadaan;
use App\Models\Lelang;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index($lelang_id){
        $lelang = Lelang::find($lelang_id);
        $perusahaan = Perusahaan::all();
        return view('pages.peserta.index', compact('lelang', 'perusahaan'));
    }

    public function show($lelang_id, $id){
        $lelang = Lelang::find($lelang_id);
        $perusahaan = Perusahaan::find($id);
        $additional_lampiran_pengadaan = AdditionalLampiranPengadaan::find($lelang_id);
        return view('pages.peserta.show', compact('lelang', 'perusahaan', 'additional_lampiran_pengadaan'));
    }
}
