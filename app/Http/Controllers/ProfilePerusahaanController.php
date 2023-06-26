<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilePerusahaan;
use Illuminate\Support\Facades\Crypt;

class ProfilePerusahaanController extends Controller
{
    public function edit($id){
        $profile_perusahaan = ProfilePerusahaan::find(Crypt::decrypt($id));
        return view('pages.profile-perusahaan.edit', compact('profile_perusahaan'));
    }

    public function update(Request $request, $id){
        $profile_perusahaan = ProfilePerusahaan::findOrFail($id);

        $request->validate([
            'sejarah_perusahaan' => 'required',
            'visi' => 'required',
            'misi' => 'required',
        ]);
        
        $profile_perusahaan->update([
            'sejarah_perusahaan' => $request->sejarah_perusahaan,
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);
        
        return back()->with('success', 'Data has been updated at '.$profile_perusahaan->created_at);
    }
}
