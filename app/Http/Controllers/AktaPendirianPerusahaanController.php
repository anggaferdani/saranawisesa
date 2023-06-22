<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\AktaPendirianPerusahaan;

class AktaPendirianPerusahaanController extends Controller
{
    public function index($user_id){
        $akta_pendirian_perusahaans = AktaPendirianPerusahaan::where('user_id', Crypt::decrypt($user_id))->latest()->paginate(10);
        return view('eproc.akta-pendirian-perusahaan.index', compact('akta_pendirian_perusahaans'));
    }
    public function create($user_id){
        return view('eproc.akta-pendirian-perusahaan.create');
    }

    public function store(Request $request, $user_id){
        $array = array(
            'user_id' => Crypt::decrypt($user_id),
            'no_pengesahan' => $request['no_pengesahan'],
            'tanggal_pengesahan' => $request['tanggal_pengesahan'],
            'nama_notaris' => $request['nama_notaris'],
        );

        $akta_pendirian_perusahaan = AktaPendirianPerusahaan::create($array);

        return redirect()->route('eproc.perusahaan.akta-pendirian-perusahaan.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been created at '.$akta_pendirian_perusahaan->created_at);
    }

    public function show($user_id, $id){
        $akta_pendirian_perusahaan = AktaPendirianPerusahaan::find(Crypt::decrypt($id));
        return view('eproc.akta-pendirian-perusahaan.show', compact('akta_pendirian_perusahaan'));
    }
    public function edit($user_id, $id){
        $akta_pendirian_perusahaan = AktaPendirianPerusahaan::find(Crypt::decrypt($id));
        return view('eproc.akta-pendirian-perusahaan.edit', compact('akta_pendirian_perusahaan'));
    }

    public function update(Request $request, $user_id, $id){
        $akta_pendirian_perusahaan = AktaPendirianPerusahaan::find(Crypt::decrypt($id));
        
        $akta_pendirian_perusahaan->update([
            'no_pengesahan' => $request->no_pengesahan,
            'tanggal_pengesahan' => $request->tanggal_pengesahan,
            'nama_notaris' => $request->nama_notaris,
        ]);

        return redirect()->route('eproc.perusahaan.akta-pendirian-perusahaan.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been updated at '.$akta_pendirian_perusahaan->created_at);
    }

    public function destroy($user_id, $id){
        $akta_pendirian_perusahaan = AktaPendirianPerusahaan::find(Crypt::decrypt($id));
        $akta_pendirian_perusahaan->delete();

        return redirect()->route('eproc.perusahaan.akta-pendirian-perusahaan.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been deleted at '.$akta_pendirian_perusahaan->created_at);
    }
}
