<?php

namespace App\Http\Controllers;

use App\Models\AdditionalLampiranPengadaan;
use App\Models\JenisPengadaan;
use App\Models\Lelang;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class LelangController extends Controller
{
    public function index(){
        $lelang = Lelang::all();
        return view('pages.lelang.index', compact('lelang'));
    }

    public function create(){
        $jenis_pengadaan = JenisPengadaan::all();
        return view('pages.lelang.create', compact('jenis_pengadaan'));
    }

    public function store(Request $request){
        $request->validate([
            'jenis_pengadaan_id' => 'required',
            'nama_lelang' => 'required',
            'urian_singkat_pekerjaan' => 'required',
            'tanggal_mulai_lelang' => 'required|after:yesterday',
            'tanggal_akhir_lelang' => 'required|after:yesterday',
            'jenis_kontrak' => 'required',
            'lokasi_pekerjaan' => 'required',
            'hps' => 'required',
            'syarat_kualifikasi' => 'required',
        ]);
        
        $id_generator = ['table' => 'lelangs', 'field' => 'kode_lelang', 'length' => 10, 'prefix' => 'PEN'];
        $kode_lelang = IdGenerator::generate($id_generator);

        $harga_perkiraan_sendiri = preg_replace('/\D/', '', $request->hps);
        $hps = trim($harga_perkiraan_sendiri);

        $input_array_lelang = array(
            'kode_lelang' => $kode_lelang,
            'jenis_pengadaan_id' => $request['jenis_pengadaan_id'],
            'nama_lelang' => $request['nama_lelang'],
            'urian_singkat_pekerjaan' => $request['urian_singkat_pekerjaan'],
            'tanggal_mulai_lelang' => $request['tanggal_mulai_lelang'],
            'tanggal_akhir_lelang' => $request['tanggal_akhir_lelang'],
            'jenis_kontrak' => $request['jenis_kontrak'],
            'lokasi_pekerjaan' => $request['lokasi_pekerjaan'],
            'hps' => $hps,
            'syarat_kualifikasi' => $request['syarat_kualifikasi'],
            'status_pengadaan' => 'lelang',
        );

        $lelang = Lelang::create($input_array_lelang);

        $additional = new AdditionalLampiranPengadaan();
        $additional->lelang_id = $lelang->id;
        if($request->has('nama_perusahaan')){ $additional->nama_perusahaan = $request->input('nama_perusahaan'); }else{ $additional->nama_perusahaan = 'tidak_aktif'; }
        if($request->has('email_perusahaan')){ $additional->email_perusahaan = $request->input('email_perusahaan'); }else{ $additional->email_perusahaan = 'tidak_aktif'; }
        if($request->has('alamat_perusahaan')){ $additional->alamat_perusahaan = $request->input('alamat_perusahaan'); }else{ $additional->alamat_perusahaan = 'tidak_aktif'; }
        if($request->has('pengajuan_anggaran')){ $additional->pengajuan_anggaran = $request->input('pengajuan_anggaran'); }else{ $additional->pengajuan_anggaran = 'tidak_aktif'; }
        $additional->save();

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.lelang.index')->with('success', 'Berhasil ditambahkan pada : '.$lelang->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.lelang.index')->with('success', 'Berhasil ditambahkan pada : '.$lelang->created_at);
        }
    }

    public function show($id){
        $lelang = Lelang::with('additional_lampiran_pengadaans', 'jenis_pengadaans')->find($id);
        return view('pages.lelang.show', compact('lelang'));
    }

    public function edit($id){
        $lelang = Lelang::find($id);
        $jenis_pengadaan = JenisPengadaan::all();
        $additional_lampiran_pengadaan = AdditionalLampiranPengadaan::where('lelang_id', $id)->first();
        return view('pages.lelang.edit', compact('lelang', 'jenis_pengadaan', 'additional_lampiran_pengadaan'));
    }

    public function update(Request $request, $id){
        $lelang = Lelang::find($id);

        $request->validate([
            'jenis_pengadaan_id' => 'required',
            'nama_lelang' => 'required',
            'urian_singkat_pekerjaan' => 'required',
            'tanggal_mulai_lelang' => 'required',
            'tanggal_akhir_lelang' => 'required',
            'jenis_kontrak' => 'required',
            'lokasi_pekerjaan' => 'required',
            'hps' => 'required',
            'syarat_kualifikasi' => 'required',
        ]);

        $harga_perkiraan_sendiri = preg_replace('/\D/', '', $request->hps);
        $hps = trim($harga_perkiraan_sendiri);
        
        $lelang->update([
            'jenis_pengadaan_id' => $request->jenis_pengadaan_id,
            'nama_lelang' => $request->nama_lelang,
            'urian_singkat_pekerjaan' => $request->urian_singkat_pekerjaan,
            'tanggal_mulai_lelang' => $request->tanggal_mulai_lelang,
            'tanggal_akhir_lelang' => $request->tanggal_akhir_lelang,
            'jenis_kontrak' => $request->jenis_kontrak,
            'lokasi_pekerjaan' => $request->lokasi_pekerjaan,
            'hps' => $hps,
            'syarat_kualifikasi' => $request->syarat_kualifikasi,
        ]);

        $lelang->additional_lampiran_pengadaans()->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'email_perusahaan' => $request->email_perusahaan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'pengajuan_anggaran' => $request->pengajuan_anggaran,
        ]);
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.lelang.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$lelang->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.lelang.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$lelang->created_at);
        }
    }

    public function destroy($id){
        $lelang = Lelang::find($id);
        
        $lelang->update([
            'status_aktif' => 2,
        ]);

        $lelang->jadwal_lelangs()->update([
            'status_aktif' => 2,
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.lelang.index')->with('success', 'Berhasil dihapus pada : '.$lelang->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.lelang.index')->with('success', 'Berhasil dihapus pada : '.$lelang->created_at);
        }
    }
}
