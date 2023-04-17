<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function profile(){
        $profile = User::where('id', auth()->user()->id)->first();
        return view('pages.profile', compact('profile'));
    }

    public function postprofile(Request $request){
        $profile = User::where('id', auth()->user()->id)->first();

        $request->validate([
            'nama_panjang' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:8',
        ]);

        if($request->password){
            $profile->email = $request->email;
            $profile->password = bcrypt($request->password);
            $profile->save();
        }else{
            $profile->email = $request->email;
            $profile->save();
        }
        
        $profile->update([
            'nama_panjang' => $request->nama_panjang,
            'email' => $request->email,
        ]);
        
        if(session()->has('compro')){
            if(auth()->user()->level == 'superadmin'){
                return redirect()->route('compro.superadmin.profile')->with('success', 'Berhasil dilakukan perubahan pada : '.$profile->created_at);
            }elseif(auth()->user()->level == 'admin'){
                return redirect()->route('compro.admin.profile')->with('success', 'Berhasil dilakukan perubahan pada : '.$profile->created_at);
            }elseif(auth()->user()->level == 'creator'){
                return redirect()->route('compro.creator.profile')->with('success', 'Berhasil dilakukan perubahan pada : '.$profile->created_at);
            }elseif(auth()->user()->level == 'helpdesk'){
                return redirect()->route('compro.helpdesk.profile')->with('success', 'Berhasil dilakukan perubahan pada : '.$profile->created_at);
            }
        }elseif(session()->has('eproc')){
            if(auth()->user()->level == 'superadmin'){
                return redirect()->route('eproc.superadmin.profile')->with('success', 'Berhasil dilakukan perubahan pada : '.$profile->created_at);
            }elseif(auth()->user()->level == 'admin'){
                return redirect()->route('eproc.admin.profile')->with('success', 'Berhasil dilakukan perubahan pada : '.$profile->created_at);
            }
        }
    }
}
