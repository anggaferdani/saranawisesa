<?php

namespace App\Http\Controllers\Pages;

use App\Models\Artikel;
use App\Models\Direksi;
use App\Models\Setting;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use App\Models\ProfilePerusahaan;
use App\Http\Controllers\Controller;

class ComproController extends Controller
{
    public function index(){
        $profile_perusahaan = ProfilePerusahaan::first();
        $portofolio = Portofolio::all();
        $artikel = Artikel::all();
        $setting = Setting::first();
        return view('pages.compro.index', compact(
            'profile_perusahaan',
            'portofolio',
            'artikel',
            'setting',
        ));
    }

    public function profile_perusahaan(){
        $profile_perusahaan = ProfilePerusahaan::first();
        $direksi = Direksi::all();
        $setting = Setting::first();
        return view('pages.compro.profile-perusahaan', compact(
            'profile_perusahaan',
            'direksi',
            'setting',
        ));
    }
    
    public function portofolio($id){
        $portofolio = Portofolio::find($id);
        $portofolio2 = Portofolio::all();
        $setting = Setting::first();
        return view('pages.compro.portofolio', compact(
            'portofolio',
            'portofolio2',
            'setting',
        ));
    }

    public function artikel($id){
        $artikel = Artikel::find($id);
        $artikel2 = Artikel::all();
        $setting = Setting::first();
        return view('pages.compro.artikel', compact(
            'artikel',
            'artikel2',
            'setting',
        ));
    }
}
