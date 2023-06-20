<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Lelang;
use App\Models\Kualifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class PerusahaanController extends Controller
{
    public function index(){
        $users = User::where('status_verifikasi', 'terverifikasi')->where('level', 'perusahaan')->where('status_aktif', 'aktif')->latest()->paginate(10);
        return view('pages.perusahaan.index', compact('users'));
    }

    public function show($id){
        $user = User::find(Crypt::decrypt($id));
        return view('pages.perusahaan.show', compact('user'));
    }

    public function destroy($id){
        $user = User::find(Crypt::decrypt($id));

        $user->update([
            'status_verifikasi2' => 'terverifikasi',
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.perusahaan.index')->with('success', 'Data has been verified at '.$user->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.perusahaan.index')->with('success', 'Data has been verified at '.$user->created_at);
        }
    }
}
