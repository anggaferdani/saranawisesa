<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\PekerjaanYangSedangDilaksanakan;

class PekerjaanYangSedangDilaksanakanController extends Controller
{
    public function index($user_id){
        $pekerjaan_yang_sedang_dilaksanakans = PekerjaanYangSedangDilaksanakan::where('user_id', Crypt::decrypt($user_id))->latest()->paginate(10);
        return view('eproc.pekerjaan-yang-sedang-dilaksanakan.index', compact('pekerjaan_yang_sedang_dilaksanakans'));
    }
    public function create($user_id){
        return view('eproc.pekerjaan-yang-sedang-dilaksanakan.create');
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
            'progres_terakhir_berdasarkan_kontrak' => $request['progres_terakhir_berdasarkan_kontrak'],
            'progres_terakhir_berdasarkan_prestasi_kerja' => $request['progres_terakhir_berdasarkan_prestasi_kerja'],
        );

        $pekerjaan_yang_sedang_dilaksanakan = PekerjaanYangSedangDilaksanakan::create($array);

        return redirect()->route('eproc.perusahaan.pekerjaan-yang-sedang-dilaksanakan.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been created at '.$pekerjaan_yang_sedang_dilaksanakan->created_at);
    }

    public function show($user_id, $id){
        $pekerjaan_yang_sedang_dilaksanakan = PekerjaanYangSedangDilaksanakan::find(Crypt::decrypt($id));
        return view('eproc.pekerjaan-yang-sedang-dilaksanakan.show', compact('pekerjaan_yang_sedang_dilaksanakan'));
    }
    public function edit($user_id, $id){
        $pekerjaan_yang_sedang_dilaksanakan = PekerjaanYangSedangDilaksanakan::find(Crypt::decrypt($id));
        return view('eproc.pekerjaan-yang-sedang-dilaksanakan.edit', compact('pekerjaan_yang_sedang_dilaksanakan'));
    }

    public function update(Request $request, $user_id, $id){
        $pekerjaan_yang_sedang_dilaksanakan = PekerjaanYangSedangDilaksanakan::find(Crypt::decrypt($id));

        $nilai = preg_replace('/\D/', '', $request->nilai_kontrak);
        $nilai_kontrak = trim($nilai);
        
        $pekerjaan_yang_sedang_dilaksanakan->update([
            'user_id' => Crypt::decrypt($user_id),
            'nama_paket_pekerjaan' => $request['nama_paket_pekerjaan'],
            'kelompok' => $request['kelompok'],
            'ringkas_lingkup_paket_pekerjaan' => $request['ringkas_lingkup_paket_pekerjaan'],
            'lokasi' => $request['lokasi'],
            'nama_pemberi_pekerjaan' => $request['nama_pemberi_pekerjaan'],
            'alamat_pemberi_pekerjaan' => $request['alamat_pemberi_pekerjaan'],
            'tanggal_kontrak' => $request['tanggal_kontrak'],
            'nilai_kontrak' => $nilai_kontrak,
            'progres_terakhir_berdasarkan_kontrak' => $request['progres_terakhir_berdasarkan_kontrak'],
            'progres_terakhir_berdasarkan_prestasi_kerja' => $request['progres_terakhir_berdasarkan_prestasi_kerja'],
        ]);

        return redirect()->route('eproc.perusahaan.pekerjaan-yang-sedang-dilaksanakan.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been updated at '.$pekerjaan_yang_sedang_dilaksanakan->created_at);
    }

    public function destroy($user_id, $id){
        $pekerjaan_yang_sedang_dilaksanakan = PekerjaanYangSedangDilaksanakan::find(Crypt::decrypt($id));
        $pekerjaan_yang_sedang_dilaksanakan->delete();

        return redirect()->route('eproc.perusahaan.pekerjaan-yang-sedang-dilaksanakan.index', ['user_id' => Crypt::encrypt(Auth::id())])->with('success', 'Data has been deleted at '.$pekerjaan_yang_sedang_dilaksanakan->created_at);
    }
}
