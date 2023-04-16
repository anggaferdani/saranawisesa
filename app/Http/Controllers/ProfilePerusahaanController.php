<?php

namespace App\Http\Controllers;

use App\Models\ProfilePerusahaan;
use Illuminate\Http\Request;

class ProfilePerusahaanController extends Controller
{
    public function index(){
        $profile_perusahaan = ProfilePerusahaan::all();
        return view('pages.profile-perusahaan.index', compact('profile_perusahaan'));
    }

    public function edit($id){
        $profile_perusahaan = ProfilePerusahaan::findOrFail($id);
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
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.profile-perusahaan.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$profile_perusahaan->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.profile-perusahaan.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$profile_perusahaan->created_at);
        }
    }
}
