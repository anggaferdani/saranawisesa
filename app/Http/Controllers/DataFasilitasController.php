<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFasilitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DataFasilitasController extends Controller
{
    public function index($user_id){
        $data_fasilitasies = DataFasilitas::where('user_id', Crypt::decrypt($user_id))->latest()->paginate(10);
        return view('eproc.data-fasilitas.index', compact('data_fasilitasies'));
    }
    public function create($user_id){
        return view('eproc.data-fasilitas.create');
    }

    public function store(Request $request, $user_id){
        $array = array(
            'user_id' => Crypt::decrypt($user_id),
            'jenis' => $request['jenis'],
            'jumlah' => $request['jumlah'],
            'kapasitas_pada_saat_ini' => $request['kapasitas_pada_saat_ini'],
            'merek_dan_tipe' => $request['merek_dan_tipe'],
            'tahun_pembuatan' => $request['tahun_pembuatan'],
            'kondisi' => $request['kondisi'],
            'lokasi' => $request['lokasi'],
        );

        $data_fasilitas = DataFasilitas::create($array);

        return redirect()->route('eproc.perusahaan.data-fasilitas.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been created at '.$data_fasilitas->created_at);
    }

    public function show($user_id, $id){
        $data_fasilitas = DataFasilitas::find(Crypt::decrypt($id));
        return view('eproc.data-fasilitas.show', compact('data_fasilitas'));
    }
    public function edit($user_id, $id){
        $data_fasilitas = DataFasilitas::find(Crypt::decrypt($id));
        return view('eproc.data-fasilitas.edit', compact('data_fasilitas'));
    }

    public function update(Request $request, $user_id, $id){
        $data_fasilitas = DataFasilitas::find(Crypt::decrypt($id));
        
        $data_fasilitas->update([
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'kapasitas_pada_saat_ini' => $request->kapasitas_pada_saat_ini,
            'merek_dan_tipe' => $request->merek_dan_tipe,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'kondisi' => $request->kondisi,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->route('eproc.perusahaan.data-fasilitas.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been updated at '.$data_fasilitas->created_at);
    }

    public function destroy($user_id, $id){
        $data_fasilitas = DataFasilitas::find(Crypt::decrypt($id));
        $data_fasilitas->delete();

        return redirect()->route('eproc.perusahaan.data-fasilitas.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been deleted at '.$data_fasilitas->created_at);
    }
}
