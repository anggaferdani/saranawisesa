<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPengadaan;
use Illuminate\Support\Facades\Crypt;

class JenisPengadaanController extends Controller
{
    public function index(){
        $jenis_pengadaans = JenisPengadaan::where('status_aktif', 'aktif')->latest()->paginate(10);
        return view('pages.jenis-pengadaan.index', compact('jenis_pengadaans'));
    }

    public function create(){
        return view('pages.jenis-pengadaan.create');
    }

    public function store(Request $request){
        $request->validate([
            'jenis_pengadaan' => 'required',
        ]);

        $array = array(
            'jenis_pengadaan' => $request['jenis_pengadaan'],
        );

        $jenis_pengadaan = JenisPengadaan::create($array);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.jenis-pengadaan.index')->with('success', 'Data has been created at '.$jenis_pengadaan->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.jenis-pengadaan.index')->with('success', 'Data has been created at '.$jenis_pengadaan->created_at);
        }
    }

    public function show($id){
        $jenis_pengadaan = JenisPengadaan::find(Crypt::decrypt($id));
        return view('pages.jenis-pengadaan.show', compact('jenis_pengadaan'));
    }

    public function edit($id){
        $jenis_pengadaan = JenisPengadaan::find(Crypt::decrypt($id));
        return view('pages.jenis-pengadaan.edit', compact('jenis_pengadaan'));
    }

    public function update(Request $request, $id){
        $jenis_pengadaan = JenisPengadaan::find(Crypt::decrypt($id));

        $request->validate([
            'jenis_pengadaan' => 'required',
        ]);
        
        $jenis_pengadaan->update([
            'jenis_pengadaan' => $request->jenis_pengadaan,
        ]);
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.jenis-pengadaan.index')->with('success', 'Data has been updated at '.$jenis_pengadaan->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.jenis-pengadaan.index')->with('success', 'Data has been updated at '.$jenis_pengadaan->created_at);
        }
    }

    public function destroy($id){
        $jenis_pengadaan = JenisPengadaan::find(Crypt::decrypt($id));

        $jenis_pengadaan->update([
            'status_aktif' => 'tidak_aktif',
        ]);

        $jenis_pengadaan->lelangs()->update([
            'status_aktif' => 'tidak aktif',
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.jenis-pengadaan.index')->with('success', 'Data has been deleted at '.$jenis_pengadaan->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.jenis-pengadaan.index')->with('success', 'Data has been deleted at '.$jenis_pengadaan->created_at);
        }
    }
}
