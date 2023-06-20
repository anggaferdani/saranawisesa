<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukDanLayanan;
use App\Models\SubprodukDanLayanan;
use Illuminate\Support\Facades\Crypt;

class SubprodukDanLayananController extends Controller
{
    public function index($produk_dan_layanan_id){
        $produk_dan_layanan = ProdukDanLayanan::find(Crypt::decrypt($produk_dan_layanan_id));
        $subproduk_dan_layanans = SubprodukDanLayanan::where('produk_dan_layanan_id', $produk_dan_layanan->id)->where('status_aktif', 'aktif')->latest()->paginate(10);
        return view('compro.subproduk-dan-layanan.index', compact(
            'produk_dan_layanan',
            'subproduk_dan_layanans',
        ));
    }

    public function create($produk_dan_layanan_id){
        $produk_dan_layanan = ProdukDanLayanan::find(Crypt::decrypt($produk_dan_layanan_id));
        return view('compro.subproduk-dan-layanan.create', compact('produk_dan_layanan'));
    }

    public function store(Request $request, $produk_dan_layanan_id){
        $produk_dan_layanan = ProdukDanLayanan::find(Crypt::decrypt($produk_dan_layanan_id));

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'thumbnail' => 'required',
        ]);

        $array = array(
            'produk_dan_layanan_id' => $produk_dan_layanan->id,
            'judul' => $request['judul'],
            'deskripsi' => $request['deskripsi'],
        );

        if($thumbnail = $request->file('thumbnail')){
            $destination_path = 'compro/subproduk-dan-layanan/thumbnail/';
            $thumbnail0002 = date('YmdHis').rand(999999999, 9999999999).$thumbnail->getClientOriginalName();
            $thumbnail->move($destination_path, $thumbnail0002);
            $array['thumbnail'] = $thumbnail0002;
        }

        $subproduk_dan_layanan = SubprodukDanLayanan::create($array);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.subproduk-dan-layanan.index', Crypt::encrypt($produk_dan_layanan->id))->with('success', 'Data has been created at '.$subproduk_dan_layanan->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.subproduk-dan-layanan.index', Crypt::encrypt($produk_dan_layanan->id))->with('success', 'Data has been created at '.$subproduk_dan_layanan->created_at);
        }
    }

    public function show($produk_dan_layanan_id, $id){
        $produk_dan_layanan = ProdukDanLayanan::find(Crypt::decrypt($produk_dan_layanan_id));
        $subproduk_dan_layanan = SubprodukDanLayanan::find(Crypt::decrypt($id));
        return view('compro.subproduk-dan-layanan.show', compact(
            'produk_dan_layanan',
            'subproduk_dan_layanan',
        ));
    }

    public function edit($produk_dan_layanan_id, $id){
        $produk_dan_layanan = ProdukDanLayanan::find(Crypt::decrypt($produk_dan_layanan_id));
        $subproduk_dan_layanan = SubprodukDanLayanan::find(Crypt::decrypt($id));
        return view('compro.subproduk-dan-layanan.edit', compact(
            'produk_dan_layanan',
            'subproduk_dan_layanan',
        ));
    }

    public function update(Request $request, $produk_dan_layanan_id, $id){
        $produk_dan_layanan = ProdukDanLayanan::find(Crypt::decrypt($produk_dan_layanan_id));
        $subproduk_dan_layanan = SubprodukDanLayanan::find(Crypt::decrypt($id));

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        if($thumbnail = $request->file('thumbnail')){
            $destination_path = 'compro/subproduk-dan-layanan/thumbnail/';
            $thumbnail0002 = date('YmdHis').rand(999999999, 9999999999).$thumbnail->getClientOriginalName();
            $thumbnail->move($destination_path, $thumbnail0002);
            $subproduk_dan_layanan['thumbnail'] = $thumbnail0002;
        }
        
        $subproduk_dan_layanan->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.subproduk-dan-layanan.index', Crypt::encrypt($produk_dan_layanan->id))->with('success', 'Data has been updated at '.$subproduk_dan_layanan->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.subproduk-dan-layanan.index', Crypt::encrypt($produk_dan_layanan->id))->with('success', 'Data has been updated at '.$subproduk_dan_layanan->created_at);
        }
    }

    public function destroy($produk_dan_layanan_id, $id){
        $produk_dan_layanan = ProdukDanLayanan::find(Crypt::decrypt($produk_dan_layanan_id));
        $subproduk_dan_layanan = SubprodukDanLayanan::find(Crypt::decrypt($id));
        
        $subproduk_dan_layanan->update([
            'status_aktif' => 'tidak aktif',
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.subproduk-dan-layanan.index', Crypt::encrypt($produk_dan_layanan->id))->with('success', 'Data has been deleted at '.$subproduk_dan_layanan->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.subproduk-dan-layanan.index', Crypt::encrypt($produk_dan_layanan->id))->with('success', 'Data has been deleted at '.$subproduk_dan_layanan->created_at);
        }
    }
}
