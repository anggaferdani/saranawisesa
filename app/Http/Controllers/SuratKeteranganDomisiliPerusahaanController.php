<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\SuratKeteranganDomisiliPerusahaan;

class SuratKeteranganDomisiliPerusahaanController extends Controller
{
    public function postSuratKeteranganDomisiliPerusahaan(Request $request){
        $user = User::find(Auth::id());

        $request->validate([
            'no_skdp' => 'required',
            'tanggal_terbit' => 'required',
            'tanggal_jatuh_tempo' => 'required',
            'skdp' => 'required',
        ]);

        $no_dokumen = hash('crc32', $this->generateNumber());

        $array = array(
            'user_id' => $user->id,
            'no_dokumen' => $no_dokumen,
            'no_skdp' => $request['no_skdp'],
            'tanggal_terbit' => $request['tanggal_terbit'],
            'tanggal_jatuh_tempo' => $request['tanggal_jatuh_tempo'],
        );

        if($skdp = $request->file('skdp')){
            $destination_path = 'eproc/surat-keterangan-domisili-perusahaan/';
            $skdp2 = date('YmdHis').$skdp->getClientOriginalName();
            $skdp->move($destination_path, $skdp2);
            $array['skdp'] = $skdp2;
        }

        $surat_keterangan_domisili_perusahaan = SuratKeteranganDomisiliPerusahaan::create($array);
        
        return back()->with('success', 'Data has been created at '.$surat_keterangan_domisili_perusahaan->created_at);
    }

    public function putSuratKeteranganDomisiliPerusahaan(Request $request, $id){
        $request->validate([
            'no_skdp' => 'required',
            'tanggal_terbit' => 'required',
            'tanggal_jatuh_tempo' => 'required',
        ]);

        $surat_keterangan_domisili_perusahaan = SuratKeteranganDomisiliPerusahaan::find(Crypt::decrypt($id));

        if($skdp = $request->file('skdp')){
            $destination_path = 'eproc/surat-keterangan-domisili-perusahaan/';
            $skdp2 = date('YmdHis').$skdp->getClientOriginalName();
            $skdp->move($destination_path, $skdp2);
            $surat_keterangan_domisili_perusahaan['skdp'] = $skdp2;
        }

        $surat_keterangan_domisili_perusahaan->update([
            'no_skdp' => $request['no_skdp'],
            'tanggal_terbit' => $request['tanggal_terbit'],
            'tanggal_jatuh_tempo' => $request['tanggal_jatuh_tempo'],
        ]);
        
        return back()->with('success', 'Data has been updated at '.$surat_keterangan_domisili_perusahaan->updated_at);
    }

    public function deleteSuratKeteranganDomisiliPerusahaan($id){
        $surat_keterangan_domisili_perusahaan = SuratKeteranganDomisiliPerusahaan::find(Crypt::decrypt($id));
        $surat_keterangan_domisili_perusahaan->delete();

        return back()->with('success', 'Data has been deleted at '.Carbon::now()->toDateTimeString());
    }

    public function generateNumber(){
        do{
            $no_dokumen = mt_rand(999999999, 9999999999);
        }while(SuratKeteranganDomisiliPerusahaan::where("no_dokumen", "=", $no_dokumen)->first());

        return $no_dokumen;
    }
}
