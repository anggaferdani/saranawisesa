<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePerusahaan2Controller extends Controller
{
    public function update(Request $request){
        $profile = User::find(Auth::id());
        $perusahaan = Perusahaan::where('user_id', Auth::id())->first();

        $profile->update([
            'nama_panjang' => $request['nama_badan_usaha'],
            'email' => $request['email_badan_usaha'],
        ]);

        if($profile_picture = $request->file('profile_picture')){
            $destination_path = 'eproc/profile-picture/';
            $profile_picture2 = date('YmdHis').rand(999999999, 9999999999).$profile_picture->getClientOriginalName();
            $profile_picture->move($destination_path, $profile_picture2);
            $perusahaan['profile_picture'] = $profile_picture2;
        }

        $perusahaan->update([
            'nama_badan_usaha' => $request['nama_badan_usaha'],
            'deskripsi' => $request['deskripsi'],
            'email_badan_usaha' => $request['email_badan_usaha'],
            'alamat_badan_usaha' => $request['alamat_badan_usaha'],
        ]);

        $perusahaan->pelayanans()->sync($request->pelayanan);
        
        return back()->with('success2', 'Data has been updated at '.$perusahaan->updated_at);
    }
}
