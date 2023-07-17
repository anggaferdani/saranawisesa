<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\GambarPerusahaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class GambarPerusahaanController extends Controller
{
    public function gambarPerusahaan($user_id){
        $user = User::find(Crypt::decrypt($user_id));
        $perusahaan = Perusahaan::where('user_id', Crypt::decrypt($user_id))->first();
        $gambar_perusahaans = GambarPerusahaan::where('user_id', Crypt::decrypt($user_id))->latest()->paginate(10);
        return view('eproc.gambar-perusahaan', compact(
            'perusahaan',
            'user',
            'gambar_perusahaans',
        ));
    }

    public function postGambarPerusahaan(Request $request, $user_id){
        $request->validate([
            'image' => 'required',
            'keterangan' => 'required',
            'tanggal_publikasi' => 'required',
        ]);

        $array = array(
            'user_id' => Crypt::decrypt($user_id),
            'keterangan' => $request['keterangan'],
            'tanggal_publikasi' => $request['tanggal_publikasi'],
            'catatan' => $request['catatan'],
        );

        if($image = $request->file('image')){
            $destination_path = 'eproc/gambar-perusahaan/image/';
            $image2 = date('YmdHis').$image->getClientOriginalName();
            $image->move($destination_path, $image2);
            $array['image'] = $image2;
        }

        $gambar_perusahaan = GambarPerusahaan::create($array);

        return redirect()->route('eproc.perusahaan.gambar-perusahaan', ['user_id' => Crypt::encrypt(Crypt::decrypt($user_id))])->with('success', 'Data has been created at '.$gambar_perusahaan->created_at);
    }

    public function putGambarPerusahaan(Request $request, $user_id, $id){
        $gambar_perusahaan = GambarPerusahaan::find(Crypt::decrypt($id));

        $request->validate([
            'keterangan' => 'required',
            'tanggal_publikasi' => 'required',
        ]);

        if($image = $request->file('image')){
            $destination_path = 'eproc/gambar-perusahaan/image/';
            $image2 = date('YmdHis').$image->getClientOriginalName();
            $image->move($destination_path, $image2);
            $gambar_perusahaan['image'] = $image2;
        }
        
        $gambar_perusahaan->update([
            'user_id' => Crypt::decrypt($user_id),
            'keterangan' => $request['keterangan'],
            'tanggal_publikasi' => $request['tanggal_publikasi'],
            'catatan' => $request['catatan'],
        ]);

        return redirect()->route('eproc.perusahaan.gambar-perusahaan', ['user_id' => Crypt::encrypt(Crypt::decrypt($user_id))])->with('success', 'Data has been updated at '.$gambar_perusahaan->updated_at);
    }

    public function deleteGambarPerusahaan($user_id, $id){
        $gambar_perusahaan = GambarPerusahaan::find(Crypt::decrypt($id));
        $gambar_perusahaan->delete();

        return redirect()->route('eproc.perusahaan.gambar-perusahaan', ['user_id' => Crypt::encrypt(Crypt::decrypt($user_id))])->with('success', 'Data has been deleted at '.$gambar_perusahaan->created_at);
    }
}
