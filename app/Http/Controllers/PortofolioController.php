<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use App\Models\PortofolioImages;
use Illuminate\Support\Facades\Crypt;

class PortofolioController extends Controller
{
    public function index(){
        $portofolios = Portofolio::where('status_aktif', 'aktif')->latest()->paginate(10);
        return view('pages.portofolio.index', compact('portofolios'));
    }

    public function create(){
        return view('pages.portofolio.create');
    }

    public function store(Request $request){
        $request->validate([
            'judul' => 'required',
            'alamat' => 'required',
            'isi' => 'required',
        ]);

        $array = array(
            'judul' => $request['judul'],
            'alamat' => $request['alamat'],
            'isi' => $request['isi'],
        );

        $portofolio = Portofolio::create($array);

        if($request->has('images')){
            foreach($request->file('images') as $image){
                $image0002 = date('YmdHis').rand(999999999, 9999999999).$image->getClientOriginalName();
                $image->move(public_path('compro/portofolio/image/'), $image0002);
                PortofolioImages::create([
                    'portofolio_id' => $portofolio->id,
                    'image' => $image0002,
                ]);
            }
        }

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.portofolio.index')->with('success', 'Data has been created at '.$portofolio->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.portofolio.index')->with('success', 'Data has been created at '.$portofolio->created_at);
        }
    }

    public function show($id){
        $portofolio = Portofolio::find(Crypt::decrypt($id));
        return view('pages.portofolio.show', compact('portofolio'));
    }

    public function edit($id){
        $portofolio = Portofolio::find(Crypt::decrypt($id));
        return view('pages.portofolio.edit', compact('portofolio'));
    }

    public function update(Request $request, $id){
        $portofolio = Portofolio::find(Crypt::decrypt($id));

        $request->validate([
            'judul' => 'required',
            'alamat' => 'required',
            'isi' => 'required',
        ]);

        $portofolio->update([
            'judul' => $request->judul,
            'alamat' => $request->alamat,
            'isi' => $request->isi,
        ]);
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.portofolio.index')->with('success', 'Data has been updated at '.$portofolio->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.portofolio.index')->with('success', 'Data has been updated at '.$portofolio->created_at);
        }
    }

    public function destroy($id){
        $portofolio = Portofolio::find(Crypt::decrypt($id));
        
        $portofolio->update([
            'status_aktif' => 'tidak aktif',
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.portofolio.index')->with('success', 'Data has been deleted at '.$portofolio->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.portofolio.index')->with('success', 'Data has been deleted at '.$portofolio->created_at);
        }
    }
}
