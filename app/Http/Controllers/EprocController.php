<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
use App\Models\Lelang;
use App\Models\Setting;
use App\Models\Lampiran;
use App\Models\Perusahaan;
use App\Models\UserLelang;
use App\Models\Kualifikasi;
use App\Models\VerifyEmail;
use Illuminate\Support\Str;
use App\Models\Administrasi;
use Illuminate\Http\Request;
use App\Models\JenisPengadaan;
use App\Models\TandaDaftarUsaha;
use App\Models\ProfilePerusahaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Models\AktaPendirianPerusahaan;
use App\Models\LampiranKualifikasi;
use App\Models\SisaKemampuanNyata;

class EprocController extends Controller
{
    public function login(){
        return view('eproc.authentications.login');
    }

    public $email, $password;

    public function postLogin(Request $request){
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $credentials = array(
            'email' => $input['email'],
            'password' => $input['password'],
        );

        if(Auth::guard('web')->attempt($credentials)){
            if(session()->has('compro')){
                session()->forget('compro');
                return $request->next;
            }elseif(!session()->has('compro')){
                if(auth()->user()->status_aktif == 'aktif'){
                    if(auth()->user()->status_verifikasi == 'terverifikasi'){
                        if(auth()->user()->level == 'superadmin'){
                            $request->session()->put('eproc', $credentials);
                            return redirect()->route('eproc.superadmin.dashboard');
                        }elseif(auth()->user()->level == 'admin'){
                            $request->session()->put('eproc', $credentials);
                            return redirect()->route('eproc.admin.dashboard');
                        }elseif(auth()->user()->level == 'perusahaan'){
                            $request->session()->put('eproc', $credentials);
                            return redirect()->route('eproc.perusahaan.dashboard');
                        }else{
                            return redirect()->route('eproc.login')->with('fail', 'The account level used for login does not match');
                        }
                    }else{
                        return redirect()->back()->with('fail', 'The account used has not been verified. Wait a few moments until the admin verifies the account used. A verification notification will be sent via email');
                    }
                }elseif(auth()->user()->status_aktif == 'tidak aktif'){
                    if(session()->has('compro')){
                        session()->forget('compro');
                        Auth::guard('web')->logout();
                        return redirect()->route('eproc.login')->with('fail', 'The status of the account used for login is inactive');
                    }elseif(!session()->has('compro')){
                        Auth::guard('web')->logout();
                        return redirect()->route('eproc.login')->with('fail', 'The status of the account used for login is inactive');
                    }
                }else{
                    return redirect()->route('eproc.login')->with('fail', 'The status of the account used for login is inactive');
                }
            }
        }else{
            return redirect()->route('eproc.login')->with('fail', 'The email or password used to login is incorrect. Try again');
        }
    }

    public function register(){
        return view('eproc.authentications.register');
    }

    public function postRegister(Request $request){
        $this->validate($request, [
            'nama_panjang' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $array = array(
            'nama_panjang' => $request['nama_panjang'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'level' => 'perusahaan',
        );

        $perusahaan = User::create($array);

        Perusahaan::create([
            'user_id' => $perusahaan->id,
            'profile_picture' => 'DEFAULT.jpg',
            'nama_badan_usaha' => $perusahaan->nama_panjang,
            'email_badan_usaha' => $perusahaan->email,
        ]);

        Administrasi::create([
            'user_id' => $perusahaan->id,
            'nama_badan_usaha' => $perusahaan->nama_panjang,
        ]);

        TandaDaftarUsaha::create([
            'user_id' => $perusahaan->id,
        ]);

        SisaKemampuanNyata::create([
            'user_id' => $perusahaan->id,
        ]);

        LampiranKualifikasi::create([
            'user_id' => $perusahaan->id,
        ]);

        $verifiy_url = route('eproc.verifikasi', ['service' => 'email_verification', 'user_id' => $perusahaan->id]);

        $message = 'To '.$request->nama_panjang;
        $message = 'Thank you for signing up. We only need you to verify your email address to finish setting up your account';

        $mail_data = [
            'recipient' => $request->email,
            'from_email' => 'saranawisesa@gmail.com',
            'from_nama' => 'SARANAWISESA PROPERINDO',
            'subject' => 'Please confirm your email address',
            'body' => $message,
            'action_link' => $verifiy_url,
        ];

        Mail::send('eproc.email.verifikasi', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
            ->from($mail_data['from_email'], $mail_data['from_nama'])
            ->subject($mail_data['subject']);
        });

        if($perusahaan){
            return redirect()->back()->with('success', 'Must verify email first. a verification link has been sent to the associated email address');
        }else{
            return redirect()->back()->with('fail', 'There was an error while registering');
        }
    }

    public function logout(){
        if(session()->has('eproc')){
            session()->forget('eproc');
            Auth::guard('web')->logout();
            return redirect()->route('eproc.index');
        }
    }

    public function verifikasi(Request $request){
        $token = $request->token;
        $user_id = $request->user_id;

        $status_verifikasi = User::where('id', $user_id);

        $status_verifikasi->update([
            'status_verifikasi' => 'terverifikasi',
        ]);

        if($status_verifikasi){
            return redirect()->route('eproc.perusahaan.dashboard');
        }
    }

    public function index(){
        $profile_perusahaan = ProfilePerusahaan::first();
        $setting = Setting::all();
        return view('eproc.index', compact(
            'profile_perusahaan',
            'setting',
        ));
    }

    public function pengadaan(){
        $jenis_pengadaans_group_by_lelang = JenisPengadaan::with(["lelangs" => function($query){ $query->where("status_pengadaan", "lelang"); }])->whereHas("lelangs", function($query){ $query->where("status_pengadaan", "lelang"); })->get();
        $jenis_pengadaans_group_by_penunjukan_langsung = JenisPengadaan::with(["lelangs" => function($query){ $query->where("status_pengadaan", "penunjukan langsung"); }])->whereHas("lelangs", function($query){ $query->where("status_pengadaan", "penunjukan langsung"); })->get();
        $jenis_pengadaans = JenisPengadaan::with('lelangs')->whereHas("lelangs", function($query){ $query->where("id", "!=", null); })->get();
        $status_pengadaan = Lelang::select('status_pengadaan')->get();
        $lelangs = Str::contains($status_pengadaan, 'lelang');
        $penunjukan_langsungs = Str::contains($status_pengadaan, 'penunjukan langsung');

        $profile_perusahaan = ProfilePerusahaan::first();
        $setting = Setting::all();
        return view('eproc.pengadaan', compact(
            'jenis_pengadaans_group_by_lelang',
            'jenis_pengadaans_group_by_penunjukan_langsung',
            'lelangs',
            'penunjukan_langsungs',
            'profile_perusahaan',
            'setting',
        ));
    }

    public function pengadaan2($id){
        $lelang = Lelang::with('jadwal_lelangs')->find(Crypt::decrypt($id));
        $ikuti_lelang = UserLelang::where('lelang_id', $lelang->id)->where('user_id', Auth::id())->first();
        $lampiran = Lampiran::where('lelang_id', $lelang->id)->where('user_id', Auth::id())->first();

        if($lelang->status_pengadaan == 'penunjukan langsung'){
            $user_lelang = UserLelang::where('lelang_id', $lelang->id)->first();
            $user = User::where('id', $user_lelang->user_id)->first();
            return view('eproc.pengadaan2', compact(
                'lelang',
                'user',
            ));
        }

        $profile_perusahaan = ProfilePerusahaan::first();
        $setting = Setting::all();
        return view('eproc.pengadaan2', compact(
            'lelang',
            'ikuti_lelang',
            'lampiran',
            'profile_perusahaan',
            'setting',
        ));

    }

    public function ikutiPengadaan($id){
        $array2 = array(
            'lelang_id' => Crypt::decrypt($id),
            'user_id' => Auth::id(),
        );

        UserLelang::create($array2);

        return redirect()->back()->with('success', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, omnis laborum in quidem consequuntur at nostrum saepe atque, deserunt non sequi sit totam iure dolores eos ipsam fugit aperiam odio.');
    }

    public function postLampiran(Request $request){
        $request->validate([
            'lelang_id' => 'required',
            'user_id' => 'required',
            'penawaran' => 'required_without_all:konsep,penawaran_dan_konsep',
            'konsep' => 'required_without_all:penawaran,penawaran_dan_konsep',
            'penawaran_dan_konsep' => 'required_without_all:penawaran,konsep',
        ]);

        $array = array(
            'lelang_id' => $request['lelang_id'],
            'user_id' => $request['user_id'],
        );

        if($penawaran = $request->file('penawaran')){
            $destination_path = 'eproc/lampiran/penawaran/';
            $penawaran0002 = date('YmdHis').rand(999999999, 9999999999).$penawaran->getClientOriginalName();
            $penawaran->move($destination_path, $penawaran0002);
            $array['penawaran'] = $penawaran0002;
        }

        if($konsep = $request->file('konsep')){
            $destination_path = 'eproc/lampiran/konsep/';
            $konsep0002 = date('YmdHis').rand(999999999, 9999999999).$konsep->getClientOriginalName();
            $konsep->move($destination_path, $konsep0002);
            $array['konsep'] = $konsep0002;
        }

        if($penawaran_dan_konsep = $request->file('penawaran_dan_konsep')){
            $destination_path = 'eproc/lampiran/penawaran-dan-konsep/';
            $penawaran_dan_konsep0002 = date('YmdHis').rand(999999999, 9999999999).$penawaran_dan_konsep->getClientOriginalName();
            $penawaran_dan_konsep->move($destination_path, $penawaran_dan_konsep0002);
            $array['penawaran_dan_konsep'] = $penawaran_dan_konsep0002;
        }

        $lampiran = Lampiran::create($array);

        return redirect()->back()->with('success', 'Data has been created at '.$lampiran->created_at.' Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, omnis laborum in quidem consequuntur at nostrum saepe atque, deserunt non sequi sit totam iure dolores eos ipsam fugit aperiam odio.');
    }

    public function berita_tentang_pengadaan(){
        $beritas = Berita::where('status_aktif', 'aktif')->latest()->paginate(10);
        $profile_perusahaan = ProfilePerusahaan::first();
        $setting = Setting::all();
        return view('eproc.berita', compact(
            'beritas',
            'profile_perusahaan',
            'setting',
        ));
    }
    public function berita_tentang_pengadaan2($id){
        $berita = Berita::find(Crypt::decrypt($id));
        $beritas = Berita::where('id', '<>', Crypt::decrypt($id))->where('status_aktif', 'aktif')->take(5)->get();
        $profile_perusahaan = ProfilePerusahaan::first();
        $setting = Setting::all();
        return view('eproc.berita2', compact(
            'berita',
            'beritas',
            'profile_perusahaan',
            'setting',
        ));
    }

    public function kontak(){
        $profile_perusahaan = ProfilePerusahaan::first();
        $setting = Setting::all();
        return view('eproc.kontak', compact(
            'profile_perusahaan',
            'setting',
        ));
    }
}
