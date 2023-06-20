<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SettingController extends Controller
{
    public function index(){
        $settings = Setting::all();
        return view('compro.setting.index', compact('settings'));
    }

    public function show($id){
        $setting = Setting::find(Crypt::decrypt($id));
        return view('compro.setting.show', compact('setting'));
    }

    public function edit($id){
        $setting = Setting::find(Crypt::decrypt($id));
        return view('compro.setting.edit', compact('setting'));
    }

    public function update(Request $request, $id){
        $setting = Setting::findOrFail(Crypt::decrypt($id));

        $request->validate([
            'isi' => 'required',
        ]);
        
        $setting->update([
            'isi' => $request->isi,
            'link' => $request->link,
        ]);
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.setting.index')->with('success', 'Data has been updated at '.$setting->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.setting.index')->with('success', 'Data has been updated at '.$setting->created_at);
        }
    }
}
