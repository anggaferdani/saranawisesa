<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukDanLayanan;
use Illuminate\Support\Facades\Crypt;

class ProdukDanLayananController extends Controller
{
    public function index(){
        $produk_dan_layanans = ProdukDanLayanan::all()->take(5);
        return view('compro.produk-dan-layanan.index', compact('produk_dan_layanans'));
    }

    public function show($id){
        $produk_dan_layanan = ProdukDanLayanan::find(Crypt::decrypt($id));
        return view('compro.produk-dan-layanan.show', compact('produk_dan_layanan'));
    }

    public function edit($id){
        $produk_dan_layanan = ProdukDanLayanan::find(Crypt::decrypt($id));
        return view('compro.produk-dan-layanan.edit', compact('produk_dan_layanan'));
    }

    public function update(Request $request, $id){
        $produk_dan_layanan = ProdukDanLayanan::find(Crypt::decrypt($id));

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        if($thumbnail = $request->file('thumbnail')){
            $destination_path = 'compro/produk-dan-layanan/thumbnail/';
            $thumbnail0002 = date('YmdHis').rand(999999999, 9999999999).$thumbnail->getClientOriginalName();
            $thumbnail->move($destination_path, $thumbnail0002);
            $produk_dan_layanan['thumbnail'] = $thumbnail0002;
        }
        
        $produk_dan_layanan->update([
            'judul' => $request['judul'],
            'deskripsi' => $request['deskripsi'],
        ]);
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.produk-dan-layanan.index')->with('success', 'Data has been updated at '.$produk_dan_layanan->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.produk-dan-layanan.index')->with('success', 'Data has been updated at '.$produk_dan_layanan->created_at);
        }
    }
}
