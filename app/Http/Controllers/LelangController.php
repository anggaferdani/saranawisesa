<?php

namespace App\Http\Controllers;

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
            'tanggal_mulai_lelang' => 'required',
            'tanggal_akhir_lelang' => 'required',
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

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.lelang.index')->with('success', 'Berhasil ditambahkan pada : '.$lelang->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.lelang.index')->with('success', 'Berhasil ditambahkan pada : '.$lelang->created_at);
        }
    }

    public function show($id){
        $lelang = Lelang::find($id);
        return view('pages.lelang.show', compact('lelang'));
    }

    public function edit($id){
        $lelang = Lelang::find($id);
        return view('pages.lelang.edit', compact('lelang'));
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

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.lelang.index')->with('success', 'Berhasil dihapus pada : '.$lelang->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.lelang.index')->with('success', 'Berhasil dihapus pada : '.$lelang->created_at);
        }
    }
}
