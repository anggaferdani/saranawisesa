<?php

namespace App\Http\Controllers\Pages;

use App\Models\User;
use App\Models\Lelang;
use App\Models\Setting;
use App\Models\Lampiran;
use App\Models\Perusahaan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\JenisPengadaan;
use App\Models\ProfilePerusahaan;
use App\Http\Controllers\Controller;

class EprocController extends Controller
{
    public function pengadaan(){
        // Joy's
        $jenisPengadaansGroupByLelang   = JenisPengadaan::with(["lelangs" => function ($query) { $query->where("status_pengadaan", "lelang"); }])->whereHas("lelangs", function ($query) { $query->where("status_pengadaan", "lelang"); })->get();
        $jenisPengadaansGroupByLangsung = JenisPengadaan::with(["lelangs" => function ($query) { $query->where("status_pengadaan", "penunjukan_langsung"); }])->whereHas("lelangs", function ($query) { $query->where("status_pengadaan", "penunjukan_langsung"); })->get();
        
        // Angga's
        $profile_perusahaan = ProfilePerusahaan::first();
        $jenis_pengadaan = JenisPengadaan::with('lelangs')->whereHas("lelangs", function ($query) { $query->where("id", "!=", null); })->get();
        $setting = Setting::first();

        $lelangs = Lelang::select('status_pengadaan')->get();
        $lelang = Str::contains($lelangs, 'lelang');
        $penunjukan_langsung = Str::contains($lelangs, 'penunjukan_langsung');

        return view('pages.eproc.pengadaan', compact(
            'profile_perusahaan',
            'jenis_pengadaan',
            'setting',
            'lelang',
            'penunjukan_langsung',
            'jenisPengadaansGroupByLelang',
            'jenisPengadaansGroupByLangsung',
        ));
    }

    public function detail_pengadaan($id){
        $profile_perusahaan = ProfilePerusahaan::first();
        $setting = Setting::first();
        $lelang = Lelang::with('perusahaans')->find($id);
        $perusahaan = Perusahaan::with('lelangs')->first();
        return view('pages.eproc.detail-pengadaan', compact(
            'profile_perusahaan',
            'setting',
            'lelang',
            'perusahaan',
        ));
    }

    public function ikut_pengadaan($id){
        $perusahaan = Perusahaan::find($id);

        $perusahaan->update([
            'lelang_id' => $id,
        ]);

        return back();
    }

    public function kirim_lampiran(Request $request){
        $request->validate([
            'lelang_id' => 'required',
            'perusahaan_id' => 'required',
            'penawaran' => 'required_without_all:konsep, penawaran_dan_konsep',
            'konsep' => 'required_without_all:penawaran, penawaran_dan_konsep',
            'penawaran_dan_konsep' => 'required_without_all:penawaran, konsep',
        ]);

        $input_array_lampiran = array(
            'lelang_id' => $request['lelang_id'],
            'perusahaan_id' => $request['perusahaan_id'],
        );

        if($penawaran = $request->file('penawaran')){
            $destination_path = 'penawaran/';
            $foto_penawaran = date('YmdHis') . "." . $penawaran->getClientOriginalExtension();
            $penawaran->move($destination_path, $foto_penawaran);
            $input_array_lampiran['penawaran'] = $foto_penawaran;
        }

        if($konsep = $request->file('konsep')){
            $destination_path = 'konsep/';
            $foto_konsep = date('YmdHis') . "." . $konsep->getClientOriginalExtension();
            $konsep->move($destination_path, $foto_konsep);
            $input_array_lampiran['konsep'] = $foto_konsep;
        }

        if($penawaran_dan_konsep = $request->file('penawaran_dan_konsep')){
            $destination_path = 'penawaran-dan-konsep/';
            $foto_penawaran_dan_konsep = date('YmdHis') . "." . $penawaran_dan_konsep->getClientOriginalExtension();
            $penawaran_dan_konsep->move($destination_path, $foto_penawaran_dan_konsep);
            $input_array_lampiran['penawaran_dan_konsep'] = $foto_penawaran_dan_konsep;
        }

        $berita = Lampiran::create($input_array_lampiran);

        return redirect()->back()->with('success', 'Berhasil ditambahkan pada : '.$berita->created_at.' Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, omnis laborum in quidem consequuntur at nostrum saepe atque, deserunt non sequi sit totam iure dolores eos ipsam fugit aperiam odio.');
    }
}
