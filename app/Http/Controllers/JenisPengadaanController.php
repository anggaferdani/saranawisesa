<?php

namespace App\Http\Controllers;

use App\Models\JenisPengadaan;
use Illuminate\Http\Request;

class JenisPengadaanController extends Controller
{
    public function index(){
        $jenis_pengadaan = JenisPengadaan::all();
        return view('pages.jenis-pengadaan.index', compact('jenis_pengadaan'));
    }

    public function create(){
        return view('pages.jenis-pengadaan.create');
    }

    public function store(Request $request){
        $request->validate([
            'jenis_pengadaan' => 'required',
        ]);

        $input_array_jenis_pengadaan = array(
            'jenis_pengadaan' => $request['jenis_pengadaan'],
        );

        $jenis_pengadaan = JenisPengadaan::create($input_array_jenis_pengadaan);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.jenis-pengadaan.index')->with('success', 'Berhasil ditambahkan pada : '.$jenis_pengadaan->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.jenis-pengadaan.index')->with('success', 'Berhasil ditambahkan pada : '.$jenis_pengadaan->created_at);
        }
    }

    public function show($id){
        $jenis_pengadaan = JenisPengadaan::find($id);
        return view('pages.jenis-pengadaan.show', compact('jenis_pengadaan'));
    }

    public function edit($id){
        $jenis_pengadaan = JenisPengadaan::find($id);
        return view('pages.jenis-pengadaan.edit', compact('jenis_pengadaan'));
    }

    public function update(Request $request, $id){
        $jenis_pengadaan = JenisPengadaan::find($id);

        $request->validate([
            'jenis_pengadaan' => 'required',
        ]);
        
        $jenis_pengadaan->update([
            'jenis_pengadaan' => $request->jenis_pengadaan,
        ]);
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.jenis-pengadaan.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$jenis_pengadaan->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.jenis-pengadaan.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$jenis_pengadaan->created_at);
        }
    }

    public function destroy($id){
        $jenis_pengadaan = JenisPengadaan::find($id);
        
        $jenis_pengadaan->update([
            'status_aktif' => 2,
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.jenis-pengadaan.index')->with('success', 'Berhasil dihapus pada : '.$jenis_pengadaan->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.jenis-pengadaan.index')->with('success', 'Berhasil dihapus pada : '.$jenis_pengadaan->created_at);
        }
    }
}
