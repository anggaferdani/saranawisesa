<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\SuratIzinUsahaPerdagangan;

class SuratIzinUsahaPerdaganganController extends Controller
{
    public function postSuratIzinUsahaPerdagangan(Request $request){
        $user = User::find(Auth::id());

        $request->validate([
            'no_siup' => 'required',
            'tanggal_terbit' => 'required',
            'tanggal_jatuh_tempo' => 'required',
            'siup' => 'required',
        ]);

        $kode_dokumen = hash('crc32', $this->generateNumber());

        $array = array(
            'user_id' => $user->id,
            'kode_dokumen' => $kode_dokumen,
            'no_siup' => $request['no_siup'],
            'tanggal_terbit' => $request['tanggal_terbit'],
            'tanggal_jatuh_tempo' => $request['tanggal_jatuh_tempo'],
        );

        if($siup = $request->file('siup')){
            $destination_path = 'eproc/surat-izin-usaha-perdagangan/';
            $siup2 = date('YmdHis').$siup->getClientOriginalName();
            $siup->move($destination_path, $siup2);
            $array['siup'] = $siup2;
        }

        $surat_keterangan_domisili_perusahaan = SuratIzinUsahaPerdagangan::create($array);
        
        return back()->with('success', 'Data has been created at '.$surat_keterangan_domisili_perusahaan->created_at);
    }

    public function putSuratIzinUsahaPerdagangan(Request $request, $id){
        $request->validate([
            'no_siup' => 'required',
            'tanggal_terbit' => 'required',
            'tanggal_jatuh_tempo' => 'required',
        ]);

        $surat_keterangan_domisili_perusahaan = SuratIzinUsahaPerdagangan::find(Crypt::decrypt($id));

        if($siup = $request->file('siup')){
            $destination_path = 'eproc/surat-izin-usaha-perdagangan/';
            $siup2 = date('YmdHis').$siup->getClientOriginalName();
            $siup->move($destination_path, $siup2);
            $surat_keterangan_domisili_perusahaan['siup'] = $siup2;
        }

        $surat_keterangan_domisili_perusahaan->update([
            'no_siup' => $request['no_siup'],
            'tanggal_terbit' => $request['tanggal_terbit'],
            'tanggal_jatuh_tempo' => $request['tanggal_jatuh_tempo'],
        ]);
        
        return back()->with('success', 'Data has been updated at '.$surat_keterangan_domisili_perusahaan->updated_at);
    }

    public function deleteSuratIzinUsahaPerdagangan($id){
        $surat_keterangan_domisili_perusahaan = SuratIzinUsahaPerdagangan::find(Crypt::decrypt($id));
        $surat_keterangan_domisili_perusahaan->delete();

        return back()->with('success', 'Data has been deleted at '.Carbon::now()->toDateTimeString());
    }

    public function generateNumber(){
        do{
            $kode_dokumen = mt_rand(999999999, 9999999999);
        }while(SuratIzinUsahaPerdagangan::where("kode_dokumen", "=", $kode_dokumen)->first());

        return $kode_dokumen;
    }
}
