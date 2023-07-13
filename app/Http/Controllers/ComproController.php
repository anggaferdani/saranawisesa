<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Banner;
use App\Models\Direksi;
use App\Models\Setting;
use App\Models\Komisaris;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use App\Models\ProdukDanLayanan;
use App\Models\ProfilePerusahaan;
use App\Models\SubprodukDanLayanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ComproController extends Controller
{
    public function login(){
        return view('pages.authentications.compro.login');
    }

    public $email, $password;

    public function postlogin(Request $request){
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        $credentials = array(
            'email' => $input['email'],
            'password' => $input['password'],
        );

        if(Auth::guard('web')->attempt($credentials)){
            if(session()->has('eproc')){
                session()->forget('eproc');
                return $request->next;
            }elseif(!session()->has('eproc')){
                if(auth()->user()->status_aktif == 'aktif'){
                    if(auth()->user()->level == 'superadmin'){
                        $request->session()->put('compro', $credentials);
                        return redirect()->route('compro.superadmin.dashboard');
                    }elseif(auth()->user()->level == 'admin'){
                        $request->session()->put('compro', $credentials);
                        return redirect()->route('compro.admin.dashboard');
                    }elseif(auth()->user()->level == 'creator'){
                        $request->session()->put('compro', $credentials);
                        return redirect()->route('compro.creator.dashboard');
                    }elseif(auth()->user()->level == 'helpdesk'){
                        $request->session()->put('compro', $credentials);
                        return redirect()->route('compro.helpdesk.dashboard');
                    }else{
                        return redirect()->route('compro.login')->with('fail', 'Level akun yang digunakan untuk login tidak sesuai');
                    }
                }elseif(auth()->user()->status_aktif == 'tidak_aktif'){
                    if(session()->has('eproc')){
                        session()->forget('eproc');
                        Auth::guard('web')->logout();
                        return redirect()->route('compro.login')->with('fail', 'Status akun yang digunakan untuk login tidak aktif');
                    }elseif(!session()->has('eproc')){
                        Auth::guard('web')->logout();
                        return redirect()->route('compro.login')->with('fail', 'Status akun yang digunakan untuk login tidak aktif');
                    }
                }else{
                    return redirect()->route('compro.login')->with('fail', 'Status akun yang digunakan untuk login tidak aktif');
                }
            }
        }else{
            return redirect()->route('compro.login')->with('fail', 'Email/Password yang digunakan untuk login salah. Coba lagi');
        }
    }

    public function logout(){
        if(session()->has('compro')){
            session()->forget('compro');
            Auth::guard('web')->logout();
            return redirect()->route('compro.login');
        }
    }

    public function index(){
        $profile_perusahaan = ProfilePerusahaan::first();
        $produk_dan_layanans = ProdukDanLayanan::where('status_aktif', 'aktif')->get();
        $portofolios = Portofolio::where('status_aktif', 'aktif')->latest()->get();
        $artikels = Artikel::where('status_aktif', 'aktif')->latest()->get();
        $setting = Setting::all();
        return view('compro.index', compact(
            'profile_perusahaan',
            'produk_dan_layanans',
            'portofolios',
            'artikels',
            'setting',
        ));
    }
    public function profile_perusahaan(){
        $direksis = Direksi::where('status_aktif', 'aktif')->get();
        $komisarisies = Komisaris::where('status_aktif', 'aktif')->get();
        $produk_dan_layanans = ProdukDanLayanan::all();
        $profile_perusahaan = ProfilePerusahaan::first();
        $setting = Setting::all();
        return view('compro.profile-perusahaan', compact(
            'direksis',
            'komisarisies',
            'profile_perusahaan',
            'produk_dan_layanans',
            'setting',
        ));
    }
    public function produk_dan_layanans(){
        $produk_dan_layanans = ProdukDanLayanan::where('status_aktif', 'aktif')->get();
        $setting = Setting::all();
        $banner = Banner::all();
        return view('compro.produk-dan-layanans', compact(
            'produk_dan_layanans',
            'setting',
            'banner',
        ));
    }

    public function produk_dan_layanan($id){
        $produk_dan_layanan = ProdukDanLayanan::find(Crypt::decrypt($id));
        $subproduk_dan_layanans = SubprodukDanLayanan::where('produk_dan_layanan_id', $produk_dan_layanan->id)->where('status_aktif', 'aktif')->get();
        $produk_dan_layanans = ProdukDanLayanan::all();
        $setting = Setting::all();
        return view('compro.produk-dan-layanan', compact(
            'produk_dan_layanan',
            'subproduk_dan_layanans',
            'produk_dan_layanans',
            'setting',
        ));
    }

    public function portofolios(){
        $portofolios = Portofolio::where('status_aktif', 'aktif')->latest()->paginate(9);
        $produk_dan_layanans = ProdukDanLayanan::all();
        $setting = Setting::all();
        $banner = Banner::all();
        return view('compro.portofolios', compact(
            'portofolios',
            'produk_dan_layanans',
            'setting',
            'banner',
        ));
    }

    public function portofolio($id){
        $portofolio = Portofolio::find(Crypt::decrypt($id));
        $produk_dan_layanans = ProdukDanLayanan::all();
        $setting = Setting::all();
        return view('compro.portofolio', compact(
            'portofolio',
            'produk_dan_layanans',
            'setting',
        ));
    }

    public function artikels(){
        $artikels = Artikel::where('status_aktif', 'aktif')->latest()->paginate(10);
        $produk_dan_layanans = ProdukDanLayanan::all();
        $setting = Setting::all();
        $banner = Banner::all();
        return view('compro.artikels', compact(
            'artikels',
            'produk_dan_layanans',
            'setting',
            'banner',
        ));
    }

    public function artikel($id){
        $artikel = Artikel::find(Crypt::decrypt($id));
        $artikels = Artikel::where('id', '<>', Crypt::decrypt($id))->where('status_aktif', 'aktif')->take(5)->get();
        $produk_dan_layanans = ProdukDanLayanan::all();
        $setting = Setting::all();
        return view('compro.artikel', compact(
            'artikel',
            'artikels',
            'produk_dan_layanans',
            'setting',
        ));
    }
}
