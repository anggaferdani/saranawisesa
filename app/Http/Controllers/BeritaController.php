<?php

namespace App\Http\Controllers;

use App\Exports\BeritaExport;
use App\Imports\BeritaImport;
use App\Models\Berita;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class BeritaController extends Controller
{
    public function export(){
        return Excel::download(new BeritaExport, 'berita.xlsx');
    }

    public function import(Request $request){
        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $file->move('eproc/berita/import/', $nama_file);

        Excel::import(new BeritaImport, public_path('eproc/berita/import/'.$nama_file));
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.berita.index')->with('success', 'Berhasil ditambahkan kedalam database');
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.berita.index')->with('success', 'Berhasil ditambahkan kedalam database');
        }
    }

    public function pdf(){
        $berita = Berita::all();
        $array = [
            'title' => 'Berita',
            'date' => date('Y/m/d'),
            'berita' => $berita,
        ];

        $pdf = PDF::loadView('pages.berita.pdf', $array);
        $pdf->set_paper("A4", "potrait");
        return $pdf->download('berita.pdf');
    }

    public function index(){
        $beritas = Berita::where('status_aktif', 'aktif')->latest()->paginate(10);
        return view('pages.berita.index', compact('beritas'));
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
            $destination_path = 'eproc/berita/';
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
            $destination_path = 'eproc/berita/';
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
            'status_aktif' => 'tidak aktif',
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.berita.index')->with('success', 'Berhasil dihapus pada : '.$berita->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.berita.index')->with('success', 'Berhasil dihapus pada : '.$berita->created_at);
        }
    }
}
