<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\SuratPengukuhanPerusahaanKenaPajak;

class SuratPengukuhanPerusahaanKenaPajakController extends Controller
{
    public function postSuratPengukuhanPerusahaanKenaPajak(Request $request){
        $user = User::find(Auth::id());

        $request->validate([
            'no_sppkp' => 'required',
            'tanggal_terbit' => 'required',
            'sppkp' => 'required',
        ]);

        $kode_dokumen = hash('crc32', $this->generateNumber());

        $array = array(
            'user_id' => $user->id,
            'kode_dokumen' => $kode_dokumen,
            'no_sppkp' => $request['no_sppkp'],
            'tanggal_terbit' => $request['tanggal_terbit'],
        );

        if($sppkp = $request->file('sppkp')){
            $destination_path = 'eproc/surat-pengukuhan-perusahaan-kena-pajak/';
            $sppkp2 = date('YmdHis').$sppkp->getClientOriginalName();
            $sppkp->move($destination_path, $sppkp2);
            $array['sppkp'] = $sppkp2;
        }

        $surat_pengukuhan_perusahaan_kena_pajak = SuratPengukuhanPerusahaanKenaPajak::create($array);
        
        return back()->with('success', 'Data has been created at '.$surat_pengukuhan_perusahaan_kena_pajak->created_at);
    }

    public function putSuratPengukuhanPerusahaanKenaPajak(Request $request, $id){
        $request->validate([
            'no_sppkp' => 'required',
            'tanggal_terbit' => 'required',
        ]);

        $surat_pengukuhan_perusahaan_kena_pajak = SuratPengukuhanPerusahaanKenaPajak::find(Crypt::decrypt($id));

        if($sppkp = $request->file('sppkp')){
            $destination_path = 'eproc/surat-pengukuhan-perusahaan-kena-pajak/';
            $sppkp2 = date('YmdHis').$sppkp->getClientOriginalName();
            $sppkp->move($destination_path, $sppkp2);
            $surat_pengukuhan_perusahaan_kena_pajak['sppkp'] = $sppkp2;
        }

        $surat_pengukuhan_perusahaan_kena_pajak->update([
            'no_sppkp' => $request['no_sppkp'],
            'tanggal_terbit' => $request['tanggal_terbit'],
        ]);
        
        return back()->with('success', 'Data has been updated at '.$surat_pengukuhan_perusahaan_kena_pajak->updated_at);
    }

    public function deleteSuratPengukuhanPerusahaanKenaPajak($id){
        $surat_pengukuhan_perusahaan_kena_pajak = SuratPengukuhanPerusahaanKenaPajak::find(Crypt::decrypt($id));
        $surat_pengukuhan_perusahaan_kena_pajak->delete();

        return back()->with('success', 'Data has been deleted at '.Carbon::now()->toDateTimeString());
    }

    public function generateNumber(){
        do{
            $kode_dokumen = mt_rand(999999999, 9999999999);
        }while(SuratPengukuhanPerusahaanKenaPajak::where("kode_dokumen", "=", $kode_dokumen)->first());

        return $kode_dokumen;
    }
}
