<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lelang;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\JenisPengadaan;
use App\Models\UserLelang;
use Illuminate\Support\Facades\Crypt;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PenunjukanLangsungController extends Controller
{
    public function index(){
        $penunjukan_langsungs = Lelang::with('users')->where('status_pengadaan', 'penunjukan langsung')->where('status_aktif', 'aktif')->latest()->paginate(10);
        return view('pages.penunjukan-langsung.index', compact('penunjukan_langsungs'));
    }

    public function create(){
        $jenis_pengadaans = JenisPengadaan::where('status_aktif', 'aktif')->get();
        $users = User::where('status_verifikasi', 'terverifikasi')->where('status_verifikasi2', 'terverifikasi')->where('level', 'perusahaan')->where('status_aktif', 'aktif')->get();
        return view('pages.penunjukan-langsung.create', compact('jenis_pengadaans', 'users'));
    }

    public function store(Request $request){
        $request->validate([
            'jenis_pengadaan_id' => 'required',
            'nama_lelang' => 'required',
            'uraian_singkat_pekerjaan' => 'required',
            'tanggal_mulai_lelang' => 'required|after:yesterday',
            'tanggal_akhir_lelang' => 'required|after:yesterday',
            'jenis_kontrak' => 'required',
            'lokasi_pekerjaan' => 'required',
            'hps' => 'required',
            'syarat_kualifikasi' => 'required',
            'lampiran_pengadaan' => 'required',
            'user_id' => 'required',
        ]);

        $id_generator = ['table' => 'lelangs', 'field' => 'kode_lelang', 'length' => 15, 'prefix' => 'pengadaan'];
        $kode_lelang = IdGenerator::generate($id_generator);

        $harga_perkiraan_sendiri = preg_replace('/\D/', '', $request->hps);
        $hps = trim($harga_perkiraan_sendiri);

        $array = array(
            'kode_lelang' => $kode_lelang,
            'jenis_pengadaan_id' => $request['jenis_pengadaan_id'],
            'user_id' => $request['user_id'],
            'nama_lelang' => $request['nama_lelang'],
            'uraian_singkat_pekerjaan' => $request['uraian_singkat_pekerjaan'],
            'tanggal_mulai_lelang' => $request['tanggal_mulai_lelang'],
            'tanggal_akhir_lelang' => $request['tanggal_akhir_lelang'],
            'jenis_kontrak' => $request['jenis_kontrak'],
            'lokasi_pekerjaan' => $request['lokasi_pekerjaan'],
            'hps' => $hps,
            'syarat_kualifikasi' => $request['syarat_kualifikasi'],
            'lampiran_pengadaan' => $request['lampiran_pengadaan'],
            'status_pengadaan' => 'penunjukan langsung',
        );

        $penunjukan_langsung = Lelang::create($array);

        $array2 = array(
            'lelang_id' => $penunjukan_langsung->id,
            'user_id' => $request['user_id'],
        );

        UserLelang::create($array2);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.penunjukan-langsung.index')->with('success', 'Data has been created at '.$penunjukan_langsung->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.penunjukan-langsung.index')->with('success', 'Data has been created at '.$penunjukan_langsung->created_at);
        }
    }

    public function show($id){
        $penunjukan_langsung = Lelang::find(Crypt::decrypt($id));
        $perusahaan = Perusahaan::where('lelang_id', $penunjukan_langsung->id);
        $jenis_pengadaans = JenisPengadaan::where('status_aktif', 'aktif')->get();
        return view('pages.penunjukan-langsung.show', compact('penunjukan_langsung', 'perusahaan', 'jenis_pengadaans'));
    }

    public function edit($id){
        $penunjukan_langsung = Lelang::find(Crypt::decrypt($id));
        $jenis_pengadaans = JenisPengadaan::where('status_aktif', 'aktif')->get();
        return view('pages.penunjukan-langsung.edit', compact('penunjukan_langsung', 'jenis_pengadaans'));
    }

    public function update(Request $request, $id){
        $penunjukan_langsung = Lelang::find(Crypt::decrypt($id));

        $request->validate([
            'jenis_pengadaan_id' => 'required',
            'nama_lelang' => 'required',
            'uraian_singkat_pekerjaan' => 'required',
            'tanggal_mulai_lelang' => 'required',
            'tanggal_akhir_lelang' => 'required',
            'jenis_kontrak' => 'required',
            'lokasi_pekerjaan' => 'required',
            'hps' => 'required',
            'syarat_kualifikasi' => 'required',
            'lampiran_pengadaan' => 'required',
        ]);

        $harga_perkiraan_sendiri = preg_replace('/\D/', '', $request->hps);
        $hps = trim($harga_perkiraan_sendiri);
        
        $penunjukan_langsung->update([
            'jenis_pengadaan_id' => $request->jenis_pengadaan_id,
            'nama_lelang' => $request->nama_lelang,
            'uraian_singkat_pekerjaan' => $request->uraian_singkat_pekerjaan,
            'tanggal_mulai_lelang' => $request->tanggal_mulai_lelang,
            'tanggal_akhir_lelang' => $request->tanggal_akhir_lelang,
            'jenis_kontrak' => $request->jenis_kontrak,
            'lokasi_pekerjaan' => $request->lokasi_pekerjaan,
            'hps' => $hps,
            'syarat_kualifikasi' => $request->syarat_kualifikasi,
            'lampiran_pengadaan' => $request->lampiran_pengadaan,
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.penunjukan-langsung.index')->with('success', 'Data has been updated at '.$penunjukan_langsung->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.penunjukan-langsung.index')->with('success', 'Data has been updated at '.$penunjukan_langsung->created_at);
        }
    }

    public function destroy($id){
        $penunjukan_langsung = Lelang::find(Crypt::decrypt($id));
        
        $penunjukan_langsung->update([
            'status_aktif' => 'tidak aktif',
        ]);

        $penunjukan_langsung->jadwal_lelangs()->update([
            'status_aktif' => 'tidak aktif',
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.penunjukan-langsung.index')->with('success', 'Data has been deleted at '.$penunjukan_langsung->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.penunjukan-langsung.index')->with('success', 'Data has been deleted at '.$penunjukan_langsung->created_at);
        }
    }
}
