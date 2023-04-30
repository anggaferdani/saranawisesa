<?php

namespace App\Http\Controllers;

use App\Models\AdditionalLampiranPengadaan;
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
        return view('pages.lelang.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_lelang' => 'required',
            'hps' => 'required',
            'tanggal_mulai_lelang' => 'required|after:yesterday',
            'tanggal_akhir_lelang' => 'required|after:yesterday',
        ]);
        
        $id_generator = ['table' => 'lelangs', 'field' => 'kode_lelang', 'length' => 10, 'prefix' => 'pen'];
        $kode_lelang = IdGenerator::generate($id_generator);

        $input_array_lelang = array(
            'kode_lelang' => $kode_lelang,
            'nama_lelang' => $request['nama_lelang'],
            'hps' => $request['hps'],
            'tanggal_mulai_lelang' => $request['tanggal_mulai_lelang'],
            'tanggal_akhir_lelang' => $request['tanggal_akhir_lelang'],
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
        $lelang = Lelang::with('additional_lampiran_pengadaans')->find($id);
        return view('pages.lelang.show', compact('lelang'));
    }

    public function edit($id){
        $lelang = Lelang::find($id);
        $additional_lampiran_pengadaan = AdditionalLampiranPengadaan::where('lelang_id', $id)->first();
        return view('pages.lelang.edit', compact('lelang', 'additional_lampiran_pengadaan'));
    }

    public function update(Request $request, $id){
        $lelang = Lelang::find($id);

        $request->validate([
            'nama_lelang' => 'required',
            'hps' => 'required',
            'tanggal_mulai_lelang' => 'required',
            'tanggal_akhir_lelang' => 'required',
        ]);
        
        $lelang->update([
            'nama_lelang' => $request->nama_lelang,
            'hps' => $request->hps,
            'tanggal_mulai_lelang' => $request->tanggal_mulai_lelang,
            'tanggal_akhir_lelang' => $request->tanggal_akhir_lelang,
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
