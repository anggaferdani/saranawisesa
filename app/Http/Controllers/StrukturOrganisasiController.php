<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class StrukturOrganisasiController extends Controller
{
    public function strukturOrganisasi($user_id){
        $user = User::find(Crypt::decrypt($user_id));
        $perusahaan = Perusahaan::where('user_id', Crypt::decrypt($user_id))->first();
        $struktur_organisasis = StrukturOrganisasi::where('user_id', Crypt::decrypt($user_id))->latest()->paginate(10);
        return view('eproc.struktur-organisasi', compact(
            'perusahaan',
            'user',
            'struktur_organisasis',
        ));
    }

    public function postStrukturOrganisasi(Request $request, $user_id){
        $request->validate([
            'posisi' => 'required',
            'nama' => 'required',
            'no_ktp' => 'required',
            'ktp' => 'required',
            'no_npwp' => 'required',
            'npwp' => 'required',
        ]);

        $array = array(
            'user_id' => Crypt::decrypt($user_id),
            'posisi' => $request['posisi'],
            'nama' => $request['nama'],
            'no_ktp' => $request['no_ktp'],
            'no_npwp' => $request['no_npwp'],
        );

        if($ktp = $request->file('ktp')){
            $destination_path = 'eproc/struktur-organisasi/ktp/';
            $ktp2 = date('YmdHis').$ktp->getClientOriginalName();
            $ktp->move($destination_path, $ktp2);
            $array['ktp'] = $ktp2;
        }

        if($npwp = $request->file('npwp')){
            $destination_path = 'eproc/struktur-organisasi/npwp/';
            $npwp2 = date('YmdHis').$npwp->getClientOriginalName();
            $npwp->move($destination_path, $npwp2);
            $array['npwp'] = $npwp2;
        }

        $struktur_organisasi = StrukturOrganisasi::create($array);

        return redirect()->route('eproc.perusahaan.struktur-organisasi', ['user_id' => Crypt::encrypt(Crypt::decrypt($user_id))])->with('success', 'Data has been created at '.$struktur_organisasi->created_at);
    }

    public function putStrukturOrganisasi(Request $request, $user_id, $id){
        $struktur_organisasi = StrukturOrganisasi::find(Crypt::decrypt($id));

        $request->validate([
            'posisi' => 'required',
            'nama' => 'required',
            'no_ktp' => 'required',
            'no_npwp' => 'required',
        ]);

        if($ktp = $request->file('ktp')){
            $destination_path = 'eproc/struktur-organisasi/ktp/';
            $ktp2 = date('YmdHis').$ktp->getClientOriginalName();
            $ktp->move($destination_path, $ktp2);
            $struktur_organisasi['ktp'] = $ktp2;
        }

        if($npwp = $request->file('npwp')){
            $destination_path = 'eproc/struktur-organisasi/npwp/';
            $npwp2 = date('YmdHis').$npwp->getClientOriginalName();
            $npwp->move($destination_path, $npwp2);
            $struktur_organisasi['npwp'] = $npwp2;
        }
        
        $struktur_organisasi->update([
            'posisi' => $request['posisi'],
            'nama' => $request['nama'],
            'no_ktp' => $request['no_ktp'],
            'no_npwp' => $request['no_npwp'],
        ]);

        return redirect()->route('eproc.perusahaan.struktur-organisasi', ['user_id' => Crypt::encrypt(Crypt::decrypt($user_id))])->with('success', 'Data has been updated at '.$struktur_organisasi->updated_at);
    }

    public function deleteStrukturOrganisasi($user_id, $id){
        $struktur_organisasi = StrukturOrganisasi::find(Crypt::decrypt($id));
        $struktur_organisasi->delete();

        return redirect()->route('eproc.perusahaan.struktur-organisasi', ['user_id' => Crypt::encrypt(Crypt::decrypt($user_id))])->with('success', 'Data has been deleted at '.$struktur_organisasi->created_at);
    }
}
