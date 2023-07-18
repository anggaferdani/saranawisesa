<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AkunBank;
use App\Models\Pelayanan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AkunBankController extends Controller
{
    public function AkunBank($user_id){
        $user = User::find(Crypt::decrypt($user_id));
        $perusahaan = Perusahaan::where('user_id', Crypt::decrypt($user_id))->first();
        $pelayanan_id = $perusahaan->pelayanans->pluck('id');
        $pelayanans = Pelayanan::select('id', 'pelayanan')->where('status_aktif', 'Aktif')->get();
        $akun_banks = AkunBank::where('user_id', Crypt::decrypt($user_id))->latest()->paginate(10);
        return view('eproc.akun-bank', compact(
            'user',
            'perusahaan',
            'pelayanans',
            'akun_banks',
        ));
    }

    public function postAkunBank(Request $request, $user_id){
        $request->validate([
            'nama_pemilik' => 'required',
            'nama_bank' => 'required',
            'no_akun' => 'required',
        ]);

        $array = array(
            'user_id' => Crypt::decrypt($user_id),
            'nama_pemilik' => $request['nama_pemilik'],
            'nama_bank' => $request['nama_bank'],
            'no_akun' => $request['no_akun'],
            'catatan' => $request['catatan'],
        );

        $akun_bank = AkunBank::create($array);

        return redirect()->route('eproc.perusahaan.akun-bank', ['user_id' => Crypt::encrypt(Crypt::decrypt($user_id))])->with('success', 'Data has been created at '.$akun_bank->created_at);
    }

    public function putAkunBank(Request $request, $user_id, $id){
        $akun_bank = AkunBank::find(Crypt::decrypt($id));

        $request->validate([
            'nama_pemilik' => 'required',
            'nama_bank' => 'required',
            'no_akun' => 'required',
        ]);

        $akun_bank->update([
            'user_id' => Crypt::decrypt($user_id),
            'nama_pemilik' => $request['nama_pemilik'],
            'nama_bank' => $request['nama_bank'],
            'no_akun' => $request['no_akun'],
            'catatan' => $request['catatan'],
        ]);

        return redirect()->route('eproc.perusahaan.akun-bank', ['user_id' => Crypt::encrypt(Crypt::decrypt($user_id))])->with('success', 'Data has been updated at '.$akun_bank->updated_at);
    }

    public function deleteAkunBank($user_id, $id){
        $akun_bank = AkunBank::find(Crypt::decrypt($id));
        $akun_bank->delete();

        return redirect()->route('eproc.perusahaan.akun-bank', ['user_id' => Crypt::encrypt(Crypt::decrypt($user_id))])->with('success', 'Data has been deleted at '.$akun_bank->created_at);
    }
}
