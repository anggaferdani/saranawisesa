<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ManagementPengadaanController extends Controller
{
    public function index(){
        $pengadaan = Pengadaan::all();
        return view('pages.pengadaan.index', compact('pengadaan'));
    }

    public function create(){
        return view('pages.pengadaan.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_pengadaan' => 'required',
            'jenis_pengadaan' => 'required',
            'hps' => 'required',
            'tanggal_mulai_pengadaan' => 'required',
            'tanggal_akhir_pengadaan' => 'required',
        ]);
        
        $id_generator = ['table' => 'pengadaans', 'field' => 'kode_pengadaan', 'length' => 10, 'prefix' => 'pen'];
        $kode_pengadaan = IdGenerator::generate($id_generator);

        $input_array_pengadaan = array(
            'kode_pengadaan' => $kode_pengadaan,
            'nama_pengadaan' => $request['nama_pengadaan'],
            'jenis_pengadaan' => $request['jenis_pengadaan'],
            'hps' => $request['hps'],
            'tanggal_mulai_pengadaan' => $request['tanggal_mulai_pengadaan'],
            'tanggal_akhir_pengadaan' => $request['tanggal_akhir_pengadaan'],
        );

        $pengadaan = Pengadaan::create($input_array_pengadaan);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.management-pengadaan.index')->with('success', 'Berhasil ditambahkan pada : '.$pengadaan->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.management-pengadaan.index')->with('success', 'Berhasil ditambahkan pada : '.$pengadaan->created_at);
        }
    }

    public function show($id){
        $pengadaan = Pengadaan::find($id);
        return view('pages.pengadaan.show', compact('pengadaan'));
    }

    public function edit($id){
        $pengadaan = Pengadaan::find($id);
        return view('pages.pengadaan.edit', compact('pengadaan'));
    }

    public function update(Request $request, $id){
        $pengadaan = Pengadaan::find($id);

        $request->validate([
            'nama_pengadaan' => 'required',
            'jenis_pengadaan' => 'required',
            'hps' => 'required',
            'tanggal_mulai_pengadaan' => 'required',
            'tanggal_akhir_pengadaan' => 'required',
        ]);
        
        $pengadaan->update([
            'nama_pengadaan' => $request->nama_pengadaan,
            'jenis_pengadaan' => $request->jenis_pengadaan,
            'hps' => $request->hps,
            'tanggal_mulai_pengadaan' => $request->tanggal_mulai_pengadaan,
            'tanggal_akhir_pengadaan' => $request->tanggal_akhir_pengadaan,
        ]);
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.management-pengadaan.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$pengadaan->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.management-pengadaan.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$pengadaan->created_at);
        }
    }

    public function destroy($id){
        $pengadaan = Pengadaan::find($id);
        
        $pengadaan->update([
            'status_aktif' => 2,
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.management-pengadaan.index')->with('success', 'Berhasil dihapus pada : '.$pengadaan->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.management-pengadaan.index')->with('success', 'Berhasil dihapus pada : '.$pengadaan->created_at);
        }
    }
}
