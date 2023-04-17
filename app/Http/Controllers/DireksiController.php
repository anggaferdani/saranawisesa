<?php

namespace App\Http\Controllers;

use App\Models\Direksi;
use Illuminate\Http\Request;

class DireksiController extends Controller
{
    public function index(){
        $direksi = Direksi::all();
        return view('pages.direksi.index', compact('direksi'));
    }

    public function create(){
        return view('pages.direksi.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_direksi' => 'required',
            'direksi' => 'required',
            'jabatan_direksi' => 'required',
            'pendapat_direksi' => 'required',
        ]);

        $input_array_direksi = array(
            'nama_direksi' => $request['nama_direksi'],
            'jabatan_direksi' => $request['jabatan_direksi'],
            'pendapat_direksi' => $request['pendapat_direksi'],
        );

        if($direksi = $request->file('direksi')){
            $destination_path = 'direksi/';
            $foto_direksi = date('YmdHis') . "." . $direksi->getClientOriginalExtension();
            $direksi->move($destination_path, $foto_direksi);
            $input_array_direksi['direksi'] = $foto_direksi;
        }

        $direksi = Direksi::create($input_array_direksi);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.direksi.index')->with('success', 'Berhasil ditambahkan pada : '.$direksi->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.direksi.index')->with('success', 'Berhasil ditambahkan pada : '.$direksi->created_at);
        }
    }

    public function show($id){
        $direksi = Direksi::find($id);
        return view('pages.direksi.show', compact('direksi'));
    }

    public function edit($id){
        $direksi = Direksi::find($id);
        return view('pages.direksi.edit', compact('direksi'));
    }

    public function update(Request $request, $id){
        $input_array_direksi = Direksi::find($id);

        $request->validate([
            'nama_direksi' => 'required',
            'jabatan_direksi' => 'required',
            'pendapat_direksi' => 'required',
        ]);

        if($direksi = $request->file('direksi')){
            $destination_path = 'direksi/';
            $foto_direksi = date('YmdHis') . "." . $direksi->getClientOriginalExtension();
            $direksi->move($destination_path, $foto_direksi);
            $input_array_direksi['direksi'] = $foto_direksi;
        }
        
        $input_array_direksi->update([
            'nama_direksi' => $request->nama_direksi,
            'jabatan_direksi' => $request->jabatan_direksi,
            'pendapat_direksi' => $request->pendapat_direksi,
        ]);
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.direksi.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$input_array_direksi->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.direksi.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$input_array_direksi->created_at);
        }
    }

    public function destroy($id){
        $direksi = Direksi::find($id);
        
        $direksi->update([
            'status_aktif' => 2,
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.direksi.index')->with('success', 'Berhasil dihapus pada : '.$direksi->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.direksi.index')->with('success', 'Berhasil dihapus pada : '.$direksi->created_at);
        }
    }
}
