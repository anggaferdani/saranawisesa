<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPersonalia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DataPersonaliaController extends Controller
{
    public function index($user_id){
        $data_personalias = DataPersonalia::where('user_id', Crypt::decrypt($user_id))->latest()->paginate(10);
        return view('eproc.data-personalia.index', compact('data_personalias'));
    }
    public function create($user_id){
        return view('eproc.data-personalia.create');
    }

    public function store(Request $request, $user_id){
        $array = array(
            'user_id' => Crypt::decrypt($user_id),
            'nama' => $request['nama'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'jabatan' => $request['jabatan'],
            'pengalaman_kerja' => $request['pengalaman_kerja'],
            'profesi_keahlian' => $request['profesi_keahlian'],
            'tahun_sertifikat_ijazah' => $request['tahun_sertifikat_ijazah'],
        );

        $data_personalia = DataPersonalia::create($array);

        return redirect()->route('eproc.perusahaan.data-personalia.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been created at '.$data_personalia->created_at);
    }

    public function show($user_id, $id){
        $data_personalia = DataPersonalia::find(Crypt::decrypt($id));
        return view('eproc.data-personalia.show', compact('data_personalia'));
    }
    public function edit($user_id, $id){
        $data_personalia = DataPersonalia::find(Crypt::decrypt($id));
        return view('eproc.data-personalia.edit', compact('data_personalia'));
    }

    public function update(Request $request, $user_id, $id){
        $data_personalia = DataPersonalia::find(Crypt::decrypt($id));
        
        $data_personalia->update([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat_pemilik_saham' => $request->alamat_pemilik_saham,
            'jabatan' => $request->jabatan,
            'pengalaman_kerja' => $request->pengalaman_kerja,
            'profesi_keahlian' => $request->profesi_keahlian,
            'tahunn_sertifikat_iajzah' => $request->tahunn_sertifikat_iajzah,
        ]);

        return redirect()->route('eproc.perusahaan.data-personalia.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been updated at '.$data_personalia->created_at);
    }

    public function destroy($user_id, $id){
        $data_personalia = DataPersonalia::find(Crypt::decrypt($id));
        $data_personalia->delete();

        return redirect()->route('eproc.perusahaan.data-personalia.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been deleted at '.$data_personalia->created_at);
    }
}
