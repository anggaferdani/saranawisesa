<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $setting = Setting::all();
        return view('pages.setting.index', compact('setting'));
    }

    public function edit($id){
        $setting = Setting::findOrFail($id);
        return view('pages.setting.edit', compact('setting'));
    }

    public function update(Request $request, $id){
        $setting = Setting::findOrFail($id);

        $request->validate([
            'nama_perusahaan' => 'required',
            'no_telepon_perusahaan' => 'required',
            'email_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'youtube' => 'required',
        ]);
        
        $setting->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'no_telepon_perusahaan' => $request->no_telepon_perusahaan,
            'email_perusahaan' => $request->email_perusahaan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
        ]);
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.setting.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$setting->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.setting.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$setting->created_at);
        }
    }
}
