<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PelayananController extends Controller
{
    public function index(){
        $pelayanans = Pelayanan::where('status_aktif', 'aktif')->latest()->paginate(10);
        return view('eproc.pelayanan.index', compact(
            'pelayanans',
        ));
    }

    public function create(){
        return view('eproc.pelayanan.create');
    }

    public function store(Request $request){
        $request->validate([
            'pelayanan' => 'required',
        ]);

        $array = array(
            'pelayanan' => $request['pelayanan'],
        );

        $pelayanan = Pelayanan::create($array);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.pelayanan.index')->with('success', 'Data has been created at '.$pelayanan->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.pelayanan.index')->with('success', 'Data has been created at '.$pelayanan->created_at);
        }
    }

    public function show($id){
        $pelayanan = Pelayanan::find(Crypt::decrypt($id));
        return view('eproc.pelayanan.show', compact(
            'pelayanan',
        ));
    }

    public function edit($id){
        $pelayanan = Pelayanan::find(Crypt::decrypt($id));
        return view('eproc.pelayanan.edit', compact(
            'pelayanan',
        ));
    }

    public function update(Request $request, $id){
        $pelayanan = Pelayanan::find(Crypt::decrypt($id));

        $request->validate([
            'pelayanan' => 'required',
        ]);

        $pelayanan->update([
            'pelayanan' => $request['pelayanan'],
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.pelayanan.index')->with('success', 'Data has been updated at '.$pelayanan->updated_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.pelayanan.index')->with('success', 'Data has been updated at '.$pelayanan->updated_at);
        }
    }

    public function destroy($id){
        $pelayanan = Pelayanan::find(Crypt::decrypt($id));
        
        $pelayanan->update([
            'status_aktif' => 'Tidak Aktif',
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.pelayanan.index')->with('success', 'Data has been deleted at '.$pelayanan->updated_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.pelayanan.index')->with('success', 'Data has been deleted at '.$pelayanan->updated_at);
        }
    }
}
