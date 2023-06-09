<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Direksi;
use App\Models\Portofolio;
use App\Models\ProfilePerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class NewComproController extends Controller
{
    public function index(){
        $profile_perusahaan = ProfilePerusahaan::first();
        $artikels = Artikel::all()->take(5);
        return view('compro.pages.index', compact(
            'profile_perusahaan',
            'artikels',
        ));
    }
    public function profile_perusahaan(){
        $profile_perusahaan = ProfilePerusahaan::first();
        $direksis = Direksi::all();
        return view('compro.pages.profile-perusahaan', compact(
            'profile_perusahaan',
            'direksis',
        ));
    }
    public function produk_dan_layanan(){
        return view('compro.pages.produk-dan-layanan');
    }

    public function portofolios(){
        $portofolios = Portofolio::paginate(10);
        return view('compro.pages.portofolios', compact(
            'portofolios',
        ));
    }

    public function portofolio($id){
        $portofolio = Portofolio::find(Crypt::decrypt($id));
        return view('compro.pages.portofolio', compact(
            'portofolio',
        ));
    }

    public function artikels(){
        $artikels = Artikel::paginate(10);
        return view('compro.pages.artikels', compact(
            'artikels',
        ));
    }

    public function artikel($id){
        $artikel = Artikel::find(Crypt::decrypt($id));
        $artikels = Artikel::where('id', '<>', Crypt::decrypt($id))->take(5)->get();
        return view('compro.pages.artikel', compact(
            'artikel',
            'artikels',
        ));
    }
}
