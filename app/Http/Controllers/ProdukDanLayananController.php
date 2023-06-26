<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukDanLayanan;
use Illuminate\Support\Facades\Crypt;

class ProdukDanLayananController extends Controller
{
    public function index(){
        $produk_dan_layanans = ProdukDanLayanan::where('status_aktif', 'aktif')->latest()->paginate(10);
        return view('compro.produk-dan-layanan.index', compact('produk_dan_layanans'));
    }

    public function create(){
        return view('compro.produk-dan-layanan.create');
    }

    public function store(Request $request){
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'thumbnail' => 'required',
        ]);

        $array = array(
            'judul' => $request['judul'],
            'deskripsi' => $request['deskripsi'],
        );

        if($thumbnail = $request->file('thumbnail')){
            $destination_path = 'compro/produk-dan-layanan/thumbnail/';
            $thumbnail0002 = date('YmdHis').rand(999999999, 9999999999).$thumbnail->getClientOriginalName();
            $thumbnail->move($destination_path, $thumbnail0002);
            $array['thumbnail'] = $thumbnail0002;
        }

        $produk_dan_layanan = ProdukDanLayanan::create($array);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.produk-dan-layanan.index')->with('success', 'Data has been created at '.$produk_dan_layanan->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.produk-dan-layanan.index')->with('success', 'Data has been created at '.$produk_dan_layanan->created_at);
        }
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

    public function destroy($id){
        $produk_dan_layanan = ProdukDanLayanan::find(Crypt::decrypt($id));
        
        $produk_dan_layanan->update([
            'status_aktif' => 'tidak aktif',
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.produk-dan-layanan.index')->with('success', 'Data has been deleted at '.$produk_dan_layanan->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.produk-dan-layanan.index')->with('success', 'Data has been deleted at '.$produk_dan_layanan->created_at);
        }
    }
}
