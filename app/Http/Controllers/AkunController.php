<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index(){
        $akun = User::all();
        return view('pages.akun.index', compact('akun'));
    }

    public function create(){
        return view('pages.akun.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_panjang' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
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
            return redirect()->route('compro.superadmin.akun.index')->with('success', 'Berhasil ditambahkan pada : '.$akun->created_at);
        }elseif(session()->has('eproc')){
            return redirect()->route('eproc.superadmin.akun.index')->with('success', 'Berhasil ditambahkan pada : '.$akun->created_at);
        }
    }

    public function show($id){
        $akun = User::find($id);
        return view('pages.akun.show', compact('akun'));
    }

    public function edit($id){
        $akun = User::find($id);
        return view('pages.akun.edit', compact('akun'));
    }

    public function update(Request $request, $id){
        $akun = User::find($id);

        $request->validate([
            'nama_panjang' => 'required',
            'email' => 'required|email',
        ]);
        
        $akun->update([
            'nama_panjang' => $request->nama_panjang,
            'email' => $request->email,
        ]);
        
        if(session()->has('compro')){
            return redirect()->route('compro.superadmin.akun.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$akun->created_at);
        }elseif(session()->has('eproc')){
            return redirect()->route('eproc.superadmin.akun.index')->with('success', 'Berhasil dilakukan perubahan pada : '.$akun->created_at);
        }
    }

    public function destroy($id){
        $akun = User::find($id);
        
        $akun->update([
            'status_aktif' => 2,
        ]);

        if(session()->has('compro')){
            return redirect()->route('compro.superadmin.akun.index')->with('success', 'Berhasil dihapus pada : '.$akun->created_at);
        }elseif(session()->has('eproc')){
            return redirect()->route('eproc.superadmin.akun.index')->with('success', 'Berhasil dihapus pada : '.$akun->created_at);
        }
    }
}
