<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AkunController extends Controller
{
    public function index(){
        $akuns = User::where('status_aktif', 'aktif')->latest()->paginate(10);
        return view('pages.akun.index', compact('akuns'));
    }

    public function create(){
        return view('pages.akun.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_panjang' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'level' => 'required',
        ]);

        $input_array_akun = array(
            'nama_panjang' => $request['nama_panjang'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'level' => $request['level'],
        );

        $akun = User::create($input_array_akun);

        if(session()->has('compro')){
            return redirect()->route('compro.superadmin.akun.index')->with('success', 'Data has been created at '.$akun->created_at);
        }elseif(session()->has('eproc')){
            return redirect()->route('eproc.superadmin.akun.index')->with('success', 'Data has been created at '.$akun->created_at);
        }
    }

    public function show($id){
        $akun = User::find(Crypt::decrypt($id));
        return view('pages.akun.show', compact('akun'));
    }

    public function edit($id){
        $akun = User::find(Crypt::decrypt($id));
        return view('pages.akun.edit', compact('akun'));
    }

    public function update(Request $request, $id){
        $akun = User::find(Crypt::decrypt($id));

        $request->validate([
            'nama_panjang' => 'required',
            'email' => 'required|email|unique:users,email,'.$akun->id.",id",
            'level' => 'required',
        ]);
        
        $akun->update([
            'nama_panjang' => $request->nama_panjang,
            'email' => $request->email,
            'level' => $request->level,
        ]);
        
        if(session()->has('compro')){
            return redirect()->route('compro.superadmin.akun.index')->with('success', 'Data has been updated at '.$akun->created_at);
        }elseif(session()->has('eproc')){
            return redirect()->route('eproc.superadmin.akun.index')->with('success', 'Data has been updated at '.$akun->created_at);
        }
    }

    public function destroy($id){
        $akun = User::find(Crypt::decrypt($id));
        
        $akun->update([
            'status_aktif' => 'tidak aktif',
        ]);

        if(session()->has('compro')){
            return redirect()->route('compro.superadmin.akun.index')->with('success', 'Data has been deleted at '.$akun->created_at);
        }elseif(session()->has('eproc')){
            return redirect()->route('eproc.superadmin.akun.index')->with('success', 'Data has been deleted at '.$akun->created_at);
        }
    }
}
