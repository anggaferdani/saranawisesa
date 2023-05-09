<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use Illuminate\Http\Request;
use App\Models\JenisPengadaan;
use App\Models\Perusahaan;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PenunjukanLangsungController extends Controller
{
    public function index(){
        $penunjukan_langsung = Lelang::with('perusahaans')->get();
        $penunjukan_langsung = Perusahaan::where('lelang_id')->get();
        return view('pages.penunjukan-langsung.index', compact('penunjukan_langsung'));
    }

    public function create(){
        $jenis_pengadaan = JenisPengadaan::all();
        $perusahaan = Perusahaan::with('users')->get();
        return view('pages.penunjukan-langsung.create', compact('jenis_pengadaan', 'perusahaan'));
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

            'lelang_id' => 'required',
        ]);

        $id_generator = ['table' => 'lelangs', 'field' => 'kode_lelang', 'length' => 10, 'prefix' => 'PEN'];
        $kode_lelang = IdGenerator::generate($id_generator);

        $harga_perkiraan_sendiri = preg_replace('/\D/', '', $request->hps);
        $hps = trim($harga_perkiraan_sendiri);

        $input_array_penunjukan_langsung = array(
            'kode_lelang' => $kode_lelang,
            'jenis_pengadaan_id' => $request['jenis_pengadaan_id'],
            'nama_lelang' => $request['nama_lelang'],
            'uraian_singkat_pekerjaan' => $request['uraian_singkat_pekerjaan'],
            'tanggal_mulai_lelang' => $request['tanggal_mulai_lelang'],
            'tanggal_akhir_lelang' => $request['tanggal_akhir_lelang'],
            'jenis_kontrak' => $request['jenis_kontrak'],
            'lokasi_pekerjaan' => $request['lokasi_pekerjaan'],
            'hps' => $hps,
            'syarat_kualifikasi' => $request['syarat_kualifikasi'],
            'lampiran_pengadaan' => $request['lampiran_pengadaan'],
            'status_pengadaan' => 'penunjukan_langsung',
        );

        $penunjukan_langsung = Lelang::create($input_array_penunjukan_langsung);

        $lelang_id = $request['lelang_id'];
        $perusahaan = Perusahaan::where('id', $lelang_id);

        $perusahaan->update([
            'lelang_id' => $penunjukan_langsung->id,
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.penunjukan-langsung.index')->with('success', 'Berhasil ditambahkan pada : '.$penunjukan_langsung->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.penunjukan-langsung.index')->with('success', 'Berhasil ditambahkan pada : '.$penunjukan_langsung->created_at);
        }
    }

    public function show($id){
        $penunjukan_langsung = Lelang::with('jenis_pengadaans', 'perusahaans')->find($id);
        $perusahaan = Perusahaan::where('lelang_id', $penunjukan_langsung->id);
        return view('pages.penunjukan-langsung.show', compact('penunjukan_langsung', 'perusahaan'));
    }

    public function edit($id){
        $penunjukan_langsung = Lelang::find($id);
        $jenis_pengadaan = JenisPengadaan::all();
        return view('pages.penunjukan-langsung.edit', compact('penunjukan_langsung', 'jenis_pengadaan'));
    }

    public function update(Request $request, $id){
        $penunjukan_langsung = Lelang::find($id);

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
            return redirect()->route('eproc.superadmin.penunjukan-langsung.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$penunjukan_langsung->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.penunjukan-langsung.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$penunjukan_langsung->created_at);
        }
    }

    public function destroy($id){
        $penunjukan_langsung = Lelang::find($id);
        
        $penunjukan_langsung->update([
            'status_aktif' => 2,
        ]);

        $penunjukan_langsung->jadwal_lelangs()->update([
            'status_aktif' => 2,
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.penunjukan-langsung.index')->with('success', 'Berhasil dihapus pada : '.$penunjukan_langsung->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.penunjukan-langsung.index')->with('success', 'Berhasil dihapus pada : '.$penunjukan_langsung->created_at);
        }
    }
}
