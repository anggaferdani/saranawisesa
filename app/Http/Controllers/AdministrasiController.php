<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AdministrasiController extends Controller
{
    public function edit($user_id){
        $administrasi = Administrasi::where('user_id', Crypt::decrypt($user_id))->first();
        return view('eproc.administrasi.edit', compact('administrasi'));
    }

    public function update(Request $request, $user_id){
        $administrasi = Administrasi::where('user_id', Crypt::decrypt($user_id))->first();
        
        $administrasi->update([
            'nama_badan_usaha' => $request->nama_badan_usaha,
            'status_badan_usaha' => $request->status_badan_usaha,
            'alamat_badan_usaha' => $request->alamat_badan_usaha,
            'no_telepon_badan_usaha' => $request->no_telepon_badan_usaha,
            'email_badan_usaha' => $request->email_badan_usaha,
        ]);

        return back()->with('success', 'Data has been updated at '.$administrasi->created_at);
    }
}
