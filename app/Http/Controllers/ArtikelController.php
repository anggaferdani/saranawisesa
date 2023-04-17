<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(){
        $artikel = Artikel::all();
        return view('pages.artikel.index', compact('artikel'));
    }

    public function create(){
        return view('pages.artikel.create');
    }

    public function store(Request $request){
        $request->validate([
            'judul_artikel' => 'required',
            'thumbnail' => 'required',
            'tanggal_publikasi' => 'required',
            'isi_artikel' => 'required',
        ]);

        $input_array_artikel = array(
            'judul_artikel' => $request['judul_artikel'],
            'tanggal_publikasi' => $request['tanggal_publikasi'],
            'isi_artikel' => $request['isi_artikel'],
        );

        if($thumbnail = $request->file('thumbnail')){
            $destination_path = 'artikel/';
            $foto_thumbnail = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destination_path, $foto_thumbnail);
            $input_array_artikel['thumbnail'] = $foto_thumbnail;
        }

        $artikel = Artikel::create($input_array_artikel);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.artikel.index')->with('success', 'Berhasil ditambahkan pada : '.$artikel->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.artikel.index')->with('success', 'Berhasil ditambahkan pada : '.$artikel->created_at);
        }elseif(auth()->user()->level == 'creator'){
            return redirect()->route('compro.creator.artikel.index')->with('success', 'Berhasil ditambahkan pada : '.$artikel->created_at);
        }
    }

    public function show($id){
        $artikel = Artikel::find($id);
        return view('pages.artikel.show', compact('artikel'));
    }

    public function edit($id){
        $artikel = Artikel::find($id);
        return view('pages.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id){
        $input_array_artikel = Artikel::find($id);

        $request->validate([
            'judul_artikel' => 'required',
            'tanggal_publikasi' => 'required',
            'isi_artikel' => 'required',
        ]);

        if($thumbnail = $request->file('thumbnail')){
            $destination_path = 'artikel/';
            $foto_thumbnail = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destination_path, $foto_thumbnail);
            $input_array_artikel['thumbnail'] = $foto_thumbnail;
        }
        
        $input_array_artikel->update([
            'judul_artikel' => $request->judul_artikel,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'isi_artikel' => $request->isi_artikel,
        ]);
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.artikel.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$input_array_artikel->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.artikel.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$input_array_artikel->created_at);
        }elseif(auth()->user()->level == 'creator'){
            return redirect()->route('compro.creator.artikel.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$input_array_artikel->created_at);
        }
    }

    public function destroy($id){
        $artikel = Artikel::find($id);
        
        $artikel->update([
            'status_aktif' => 2,
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.artikel.index')->with('success', 'Berhasil dihapus pada : '.$artikel->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.artikel.index')->with('success', 'Berhasil dihapus pada : '.$artikel->created_at);
        }elseif(auth()->user()->level == 'creator'){
            return redirect()->route('compro.creator.artikel.index')->with('success', 'Berhasil dihapus pada : '.$artikel->created_at);
        }
    }
}
