<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(){
        $berita = Berita::all();
        return view('pages.berita.index', compact('berita'));
    }

    public function create(){
        return view('pages.berita.create');
    }

    public function store(Request $request){
        $request->validate([
            'judul_berita' => 'required',
            'thumbnail' => 'required',
            'tanggal_publikasi' => 'required',
            'isi_berita' => 'required',
        ]);

        $input_array_berita = array(
            'judul_berita' => $request['judul_berita'],
            'tanggal_publikasi' => $request['tanggal_publikasi'],
            'isi_berita' => $request['isi_berita'],
        );

        if($thumbnail = $request->file('thumbnail')){
            $destination_path = 'berita/';
            $foto_thumbnail = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destination_path, $foto_thumbnail);
            $input_array_berita['thumbnail'] = $foto_thumbnail;
        }

        $berita = Berita::create($input_array_berita);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.berita.index')->with('success', 'Berhasil ditambahkan pada : '.$berita->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.berita.index')->with('success', 'Berhasil ditambahkan pada : '.$berita->created_at);
        }
    }

    public function show($id){
        $berita = Berita::find($id);
        return view('pages.berita.show', compact('berita'));
    }

    public function edit($id){
        $berita = Berita::find($id);
        return view('pages.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id){
        $input_array_berita = Berita::find($id);

        $request->validate([
            'judul_berita' => 'required',
            'tanggal_publikasi' => 'required',
            'isi_berita' => 'required',
        ]);

        if($thumbnail = $request->file('thumbnail')){
            $destination_path = 'berita/';
            $foto_thumbnail = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destination_path, $foto_thumbnail);
            $input_array_berita['thumbnail'] = $foto_thumbnail;
        }
        
        $input_array_berita->update([
            'judul_berita' => $request->judul_berita,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'isi_berita' => $request->isi_berita,
        ]);
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.berita.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$input_array_berita->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.berita.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$input_array_berita->created_at);
        }
    }

    public function destroy($id){
        $berita = Berita::find($id);
        
        $berita->update([
            'status_aktif' => 2,
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.berita.index')->with('success', 'Berhasil dihapus pada : '.$berita->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.berita.index')->with('success', 'Berhasil dihapus pada : '.$berita->created_at);
        }
    }
}
