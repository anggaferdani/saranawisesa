<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengalaman;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PengalamanController extends Controller
{
    public function Pengalaman($user_id){
        $user = User::find(Crypt::decrypt($user_id));
        $perusahaan = Perusahaan::where('user_id', Crypt::decrypt($user_id))->first();
        $pengalamans = Pengalaman::where('user_id', Crypt::decrypt($user_id))->latest()->paginate(10);
        return view('eproc.pengalaman', compact(
            'perusahaan',
            'user',
            'pengalamans',
        ));
    }

    public function postPengalaman(Request $request, $user_id){
        $request->validate([
            'nama_pekerjaan' => 'required',
            'pemberi_pekerjaan' => 'required',
            'ringkas_lingkup_pekerjaan' => 'required',
            'lokasi' => 'required',
            'tanggal_kontrak' => 'required',
            'nilai_kontrak' => 'required',
            'kontrak' => 'required',
            'tanggal_selesai_berdasarkan_kontrak' => 'required',
            'tanggal_selesai_berdasarkan_ba_serah_terima' => 'required',
        ]);

        $nilai_kontrak = preg_replace('/\D/', '', $request->nilai_kontrak);
        $nilai_kontrak2 = trim($nilai_kontrak);

        $array = array(
            'user_id' => Crypt::decrypt($user_id),
            'nama_pekerjaan' => $request['nama_pekerjaan'],
            'pemberi_pekerjaan' => $request['pemberi_pekerjaan'],
            'ringkas_lingkup_pekerjaan' => $request['ringkas_lingkup_pekerjaan'],
            'lokasi' => $request['lokasi'],
            'tanggal_kontrak' => $request['tanggal_kontrak'],
            'nilai_kontrak' => $nilai_kontrak2,
            'tanggal_selesai_berdasarkan_kontrak' => $request['tanggal_selesai_berdasarkan_kontrak'],
            'tanggal_selesai_berdasarkan_ba_serah_terima' => $request['tanggal_selesai_berdasarkan_ba_serah_terima'],
        );

        if($kontrak = $request->file('kontrak')){
            $destination_path = 'eproc/pengalaman/kontrak/';
            $kontrak2 = date('YmdHis').$kontrak->getClientOriginalName();
            $kontrak->move($destination_path, $kontrak2);
            $array['kontrak'] = $kontrak2;
        }

        $pengalaman = Pengalaman::create($array);

        return redirect()->route('eproc.perusahaan.pengalaman', ['user_id' => Crypt::encrypt(Crypt::decrypt($user_id))])->with('success', 'Data has been created at '.$pengalaman->created_at);
    }

    public function putPengalaman(Request $request, $user_id, $id){
        $pengalaman = Pengalaman::find(Crypt::decrypt($id));

        $request->validate([
            'nama_pekerjaan' => 'required',
            'pemberi_pekerjaan' => 'required',
            'ringkas_lingkup_pekerjaan' => 'required',
            'lokasi' => 'required',
            'tanggal_kontrak' => 'required',
            'nilai_kontrak' => 'required',
            'tanggal_selesai_berdasarkan_kontrak' => 'required',
            'tanggal_selesai_berdasarkan_ba_serah_terima' => 'required',
        ]);

        $nilai_kontrak = preg_replace('/\D/', '', $request->nilai_kontrak);
        $nilai_kontrak2 = trim($nilai_kontrak);

        if($kontrak = $request->file('kontrak')){
            $destination_path = 'eproc/pengalaman/kontrak/';
            $kontrak2 = date('YmdHis').$kontrak->getClientOriginalName();
            $kontrak->move($destination_path, $kontrak2);
            $pengalaman['kontrak'] = $kontrak2;
        }
        
        $pengalaman->update([
            'user_id' => Crypt::decrypt($user_id),
            'nama_pekerjaan' => $request['nama_pekerjaan'],
            'pemberi_pekerjaan' => $request['pemberi_pekerjaan'],
            'ringkas_lingkup_pekerjaan' => $request['ringkas_lingkup_pekerjaan'],
            'lokasi' => $request['lokasi'],
            'tanggal_kontrak' => $request['tanggal_kontrak'],
            'nilai_kontrak' => $nilai_kontrak2,
            'tanggal_selesai_berdasarkan_kontrak' => $request['tanggal_selesai_berdasarkan_kontrak'],
            'tanggal_selesai_berdasarkan_ba_serah_terima' => $request['tanggal_selesai_berdasarkan_ba_serah_terima'],
        ]);

        return redirect()->route('eproc.perusahaan.pengalaman', ['user_id' => Crypt::encrypt(Crypt::decrypt($user_id))])->with('success', 'Data has been updated at '.$pengalaman->updated_at);
    }

    public function deletePengalaman($user_id, $id){
        $pengalaman = Pengalaman::find(Crypt::decrypt($id));
        $pengalaman->delete();

        return redirect()->route('eproc.perusahaan.pengalaman', ['user_id' => Crypt::encrypt(Crypt::decrypt($user_id))])->with('success', 'Data has been deleted at '.$pengalaman->created_at);
    }
}
