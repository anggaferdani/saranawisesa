<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\SusunanKepemilikanSaham;

class SusunanKepemilikanSahamController extends Controller
{
    public function index($user_id){
        $susunan_kepemilikan_sahams = SusunanKepemilikanSaham::where('user_id', Crypt::decrypt($user_id))->latest()->paginate(10);
        return view('eproc.susunan-kepemilikan-saham.index', compact('susunan_kepemilikan_sahams'));
    }
    public function create($user_id){
        return view('eproc.susunan-kepemilikan-saham.create');
    }

    public function store(Request $request, $user_id){
        $array = array(
            'user_id' => Crypt::decrypt($user_id),
            'nama_pemilik_saham' => $request['nama_pemilik_saham'],
            'no_ktp_paspor_keterangan_domisili_tinggal_pemilik_saham' => $request['no_ktp_paspor_keterangan_domisili_tinggal_pemilik_saham'],
            'alamat_pemilik_saham' => $request['alamat_pemilik_saham'],
            'persentase_kepemilikan_saham' => $request['persentase_kepemilikan_saham'],
        );

        $susunan_kepemilikan_saham = SusunanKepemilikanSaham::create($array);

        return redirect()->route('eproc.perusahaan.susunan-kepemilikan-saham.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been created at '.$susunan_kepemilikan_saham->created_at);
    }

    public function show($user_id, $id){
        $susunan_kepemilikan_saham = SusunanKepemilikanSaham::find(Crypt::decrypt($id));
        return view('eproc.susunan-kepemilikan-saham.show', compact('susunan_kepemilikan_saham'));
    }
    public function edit($user_id, $id){
        $susunan_kepemilikan_saham = SusunanKepemilikanSaham::find(Crypt::decrypt($id));
        return view('eproc.susunan-kepemilikan-saham.edit', compact('susunan_kepemilikan_saham'));
    }

    public function update(Request $request, $user_id, $id){
        $susunan_kepemilikan_saham = SusunanKepemilikanSaham::find(Crypt::decrypt($id));
        
        $susunan_kepemilikan_saham->update([
            'nama_pemilik_saham' => $request->nama_pemilik_saham,
            'no_ktp_paspor_keterangan_domisili_tinggal_pemilik_saham' => $request->no_ktp_paspor_keterangan_domisili_tinggal_pemilik_saham,
            'alamat_pemilik_saham' => $request->alamat_pemilik_saham,
            'persentase_kepemilikan_saham' => $request->persentase_kepemilikan_saham,
        ]);

        return redirect()->route('eproc.perusahaan.susunan-kepemilikan-saham.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been updated at '.$susunan_kepemilikan_saham->created_at);
    }

    public function destroy($user_id, $id){
        $susunan_kepemilikan_saham = SusunanKepemilikanSaham::find(Crypt::decrypt($id));
        $susunan_kepemilikan_saham->delete();

        return redirect()->route('eproc.perusahaan.susunan-kepemilikan-saham.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been deleted at '.$susunan_kepemilikan_saham->created_at);
    }
}
