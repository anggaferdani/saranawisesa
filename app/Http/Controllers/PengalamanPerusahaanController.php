<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengalamanPerusahaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PengalamanPerusahaanController extends Controller
{
    public function index($user_id){
        $pengalaman_perusahaans = PengalamanPerusahaan::where('user_id', Crypt::decrypt($user_id))->latest()->paginate(10);
        return view('eproc.pengalaman-perusahaan.index', compact('pengalaman_perusahaans'));
    }
    public function create($user_id){
        return view('eproc.pengalaman-perusahaan.create');
    }

    public function store(Request $request, $user_id){
        $nilai = preg_replace('/\D/', '', $request->nilai_kontrak);
        $nilai_kontrak = trim($nilai);

        $array = array(
            'user_id' => Crypt::decrypt($user_id),
            'nama_paket_pekerjaan' => $request['nama_paket_pekerjaan'],
            'kelompok' => $request['kelompok'],
            'ringkas_lingkup_paket_pekerjaan' => $request['ringkas_lingkup_paket_pekerjaan'],
            'lokasi' => $request['lokasi'],
            'nama_pemberi_pekerjaan' => $request['nama_pemberi_pekerjaan'],
            'alamat_pemberi_pekerjaan' => $request['alamat_pemberi_pekerjaan'],
            'tanggal_kontrak' => $request['tanggal_kontrak'],
            'nilai_kontrak' => $nilai_kontrak,
            'status_penyedia_pekerjaan' => $request['status_penyedia_pekerjaan'],
            'tanggal_selesai_berdasarkan_kontrak' => $request['tanggal_selesai_berdasarkan_kontrak'],
            'tanggal_selesai_berdasarkan_ba_serah_terima' => $request['tanggal_selesai_berdasarkan_ba_serah_terima'],
        );

        $pengalaman_perusahaan = PengalamanPerusahaan::create($array);

        return redirect()->route('eproc.perusahaan.pengalaman-perusahaan.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been created at '.$pengalaman_perusahaan->created_at);
    }

    public function show($user_id, $id){
        $pengalaman_perusahaan = PengalamanPerusahaan::find(Crypt::decrypt($id));
        return view('eproc.pengalaman-perusahaan.show', compact('pengalaman_perusahaan'));
    }
    public function edit($user_id, $id){
        $pengalaman_perusahaan = PengalamanPerusahaan::find(Crypt::decrypt($id));
        return view('eproc.pengalaman-perusahaan.edit', compact('pengalaman_perusahaan'));
    }

    public function update(Request $request, $user_id, $id){
        $pengalaman_perusahaan = PengalamanPerusahaan::find(Crypt::decrypt($id));

        $nilai = preg_replace('/\D/', '', $request->nilai_kontrak);
        $nilai_kontrak = trim($nilai);
        
        $pengalaman_perusahaan->update([
            'user_id' => Crypt::decrypt($user_id),
            'nama_paket_pekerjaan' => $request['nama_paket_pekerjaan'],
            'kelompok' => $request['kelompok'],
            'ringkas_lingkup_paket_pekerjaan' => $request['ringkas_lingkup_paket_pekerjaan'],
            'lokasi' => $request['lokasi'],
            'nama_pemberi_pekerjaan' => $request['nama_pemberi_pekerjaan'],
            'alamat_pemberi_pekerjaan' => $request['alamat_pemberi_pekerjaan'],
            'tanggal_kontrak' => $request['tanggal_kontrak'],
            'nilai_kontrak' => $nilai_kontrak,
            'status_penyedia_pekerjaan' => $request['status_penyedia_pekerjaan'],
            'tanggal_selesai_berdasarkan_kontrak' => $request['tanggal_selesai_berdasarkan_kontrak'],
            'tanggal_selesai_berdasarkan_ba_serah_terima' => $request['tanggal_selesai_berdasarkan_ba_serah_terima'],
        ]);

        return redirect()->route('eproc.perusahaan.pengalaman-perusahaan.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been updated at '.$pengalaman_perusahaan->created_at);
    }

    public function destroy($user_id, $id){
        $pengalaman_perusahaan = PengalamanPerusahaan::find(Crypt::decrypt($id));
        $pengalaman_perusahaan->delete();

        return redirect()->route('eproc.perusahaan.pengalaman-perusahaan.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been deleted at '.$pengalaman_perusahaan->created_at);
    }
}
