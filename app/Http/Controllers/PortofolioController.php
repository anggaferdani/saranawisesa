<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\PortofolioImages;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index(){
        $portofolio = Portofolio::all();
        return view('pages.portofolio.index', compact('portofolio'));
    }

    public function create(){
        return view('pages.portofolio.create');
    }

    public function store(Request $request){
        $request->validate([
            'judul_portofolio' => 'required',
            'portofolio' => 'required',
            'alamat_portofolio' => 'required',
            'isi_portofolio' => 'required',
        ]);

        $input_array_portofolio = array(
            'judul_portofolio' => $request['judul_portofolio'],
            'alamat_portofolio' => $request['alamat_portofolio'],
            'isi_portofolio' => $request['isi_portofolio'],
        );

        if($portofolio = $request->file('portofolio')){
            $destination_path = 'portofolio/';
            $foto_portofolio = date('YmdHis') . "." . $portofolio->getClientOriginalExtension();
            $portofolio->move($destination_path, $foto_portofolio);
            $input_array_portofolio['portofolio'] = $foto_portofolio;
        }

        $portofolio = Portofolio::create($input_array_portofolio);

        if($request->has('images')){
            foreach($request->file('images') as $image){
                $imageName = date('YmdHis'). "." .rand(999999999, 9999999999).$image->extension();
                $image->move(public_path('portofolio/image/'), $imageName);
                PortofolioImages::create([
                    'portofolio_id' => $portofolio->id,
                    'image' => $imageName,
                ]);
            }
        }

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.portofolio.index')->with('success', 'Berhasil ditambahkan pada : '.$portofolio->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.portofolio.index')->with('success', 'Berhasil ditambahkan pada : '.$portofolio->created_at);
        }
    }

    public function show($id){
        $portofolio = Portofolio::find($id);
        return view('pages.portofolio.show', compact('portofolio'));
    }

    public function edit($id){
        $portofolio = Portofolio::find($id);
        return view('pages.portofolio.edit', compact('portofolio'));
    }

    public function update(Request $request, $id){
        $input_array_portofolio = Portofolio::find($id);

        $request->validate([
            'judul_portofolio' => 'required',
            'alamat_portofolio' => 'required',
            'isi_portofolio' => 'required',
        ]);

        if($portofolio = $request->file('portofolio')){
            $destination_path = 'portofolio/';
            $foto_portofolio = date('YmdHis') . "." . $portofolio->getClientOriginalExtension();
            $portofolio->move($destination_path, $foto_portofolio);
            $input_array_portofolio['portofolio'] = $foto_portofolio;
        }
        
        $input_array_portofolio->update([
            'judul_portofolio' => $request->judul_portofolio,
            'alamat_portofolio' => $request->alamat_portofolio,
            'isi_portofolio' => $request->isi_portofolio,
        ]);
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.portofolio.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$input_array_portofolio->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.portofolio.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$input_array_portofolio->created_at);
        }
    }

    public function destroy($id){
        $portofolio = Portofolio::find($id);
        
        $portofolio->update([
            'status_aktif' => 2,
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.portofolio.index')->with('success', 'Berhasil dihapus pada : '.$portofolio->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.portofolio.index')->with('success', 'Berhasil dihapus pada : '.$portofolio->created_at);
        }
    }
}
