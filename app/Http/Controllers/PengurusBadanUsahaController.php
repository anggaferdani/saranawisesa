<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PengurusBadanUsaha;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PengurusBadanUsahaController extends Controller
{
    public function index($user_id){
        $user = User::find(Crypt::decrypt($user_id));
        $pengurus_badan_usahas = PengurusBadanUsaha::where('user_id', Crypt::decrypt($user_id))->latest()->paginate(10);
        return view('eproc.pengurus-badan-usaha.index', compact(
            'user',
            'pengurus_badan_usahas',
        ));
    }
    public function create($user_id){
        return view('eproc.pengurus-badan-usaha.create');
    }

    public function store(Request $request, $user_id){
        $array = array(
            'user_id' => Crypt::decrypt($user_id),
            'nama_pengurus_badan_usaha' => $request['nama_pengurus_badan_usaha'],
            'no_ktp_paspor_keterangan_domisili_tinggal' => $request['no_ktp_paspor_keterangan_domisili_tinggal'],
            'jabatan' => $request['jabatan'],
            'jabatan_pengurus_badan_usaha' => $request['jabatan_pengurus_badan_usaha'],
        );

        $pengurus_badan_usaha = PengurusBadanUsaha::create($array);

        return redirect()->route('eproc.perusahaan.pengurus-badan-usaha.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been created at '.$pengurus_badan_usaha->created_at);
    }

    public function show($user_id, $id){
        $user = User::find(Crypt::decrypt($user_id));
        $pengurus_badan_usaha = PengurusBadanUsaha::find(Crypt::decrypt($id));
        return view('eproc.pengurus-badan-usaha.show', compact(
            'user',
            'pengurus_badan_usaha',
        ));
    }
    public function edit($user_id, $id){
        $pengurus_badan_usaha = PengurusBadanUsaha::find(Crypt::decrypt($id));
        return view('eproc.pengurus-badan-usaha.edit', compact(
            'pengurus_badan_usaha',
        ));
    }

    public function update(Request $request, $user_id, $id){
        $pengurus_badan_usaha = PengurusBadanUsaha::find(Crypt::decrypt($id));
        
        $pengurus_badan_usaha->update([
            'nama_pengurus_badan_usaha' => $request->nama_pengurus_badan_usaha,
            'no_ktp_paspor_keterangan_domisili_tinggal' => $request->no_ktp_paspor_keterangan_domisili_tinggal,
            'jabatan' => $request->jabatan,
            'jabatan_pengurus_badan_usaha' => $request->jabatan_pengurus_badan_usaha,
        ]);

        return redirect()->route('eproc.perusahaan.pengurus-badan-usaha.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been updated at '.$pengurus_badan_usaha->created_at);
    }

    public function destroy($user_id, $id){
        $pengurus_badan_usaha = PengurusBadanUsaha::find(Crypt::decrypt($id));
        $pengurus_badan_usaha->delete();

        return redirect()->route('eproc.perusahaan.pengurus-badan-usaha.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been deleted at '.$pengurus_badan_usaha->created_at);
    }
}
