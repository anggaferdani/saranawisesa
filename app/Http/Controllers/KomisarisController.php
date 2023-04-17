<?php

namespace App\Http\Controllers;

use App\Models\Komisaris;
use Illuminate\Http\Request;

class KomisarisController extends Controller
{
    public function index(){
        $komisaris = Komisaris::all();
        return view('pages.komisaris.index', compact('komisaris'));
    }

    public function create(){
        return view('pages.komisaris.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_komisaris' => 'required',
            'komisaris' => 'required',
            'jabatan_komisaris' => 'required',
            'pendapat_komisaris' => 'required',
        ]);

        $input_array_komisaris = array(
            'nama_komisaris' => $request['nama_komisaris'],
            'jabatan_komisaris' => $request['jabatan_komisaris'],
            'pendapat_komisaris' => $request['pendapat_komisaris'],
        );

        if($komisaris = $request->file('komisaris')){
            $destination_path = 'komisaris/';
            $foto_komisaris = date('YmdHis') . "." . $komisaris->getClientOriginalExtension();
            $komisaris->move($destination_path, $foto_komisaris);
            $input_array_komisaris['komisaris'] = $foto_komisaris;
        }

        $komisaris = Komisaris::create($input_array_komisaris);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.komisaris.index')->with('success', 'Berhasil ditambahkan pada : '.$komisaris->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.komisaris.index')->with('success', 'Berhasil ditambahkan pada : '.$komisaris->created_at);
        }
    }

    public function show($id){
        $komisaris = Komisaris::find($id);
        return view('pages.komisaris.show', compact('komisaris'));
    }

    public function edit($id){
        $komisaris = Komisaris::find($id);
        return view('pages.komisaris.edit', compact('komisaris'));
    }

    public function update(Request $request, $id){
        $input_array_komisaris = Komisaris::find($id);

        $request->validate([
            'nama_komisaris' => 'required',
            'jabatan_komisaris' => 'required',
            'pendapat_komisaris' => 'required',
        ]);

        if($komisaris = $request->file('komisaris')){
            $destination_path = 'komisaris/';
            $foto_komisaris = date('YmdHis') . "." . $komisaris->getClientOriginalExtension();
            $komisaris->move($destination_path, $foto_komisaris);
            $input_array_komisaris['komisaris'] = $foto_komisaris;
        }
        
        $input_array_komisaris->update([
            'nama_komisaris' => $request->nama_komisaris,
            'jabatan_komisaris' => $request->jabatan_komisaris,
            'pendapat_komisaris' => $request->pendapat_komisaris,
        ]);
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.komisaris.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$input_array_komisaris->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.komisaris.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$input_array_komisaris->created_at);
        }
    }

    public function destroy($id){
        $komisaris = Komisaris::find($id);
        
        $komisaris->update([
            'status_aktif' => 2,
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.komisaris.index')->with('success', 'Berhasil dihapus pada : '.$komisaris->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.komisaris.index')->with('success', 'Berhasil dihapus pada : '.$komisaris->created_at);
        }
    }
}
