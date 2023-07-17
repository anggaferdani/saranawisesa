<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\NomorIndukBerusaha;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class NomorIndukBerusahaController extends Controller
{
    public function postNomorIndukBerusaha(Request $request){
        $user = User::find(Auth::id());

        $request->validate([
            'tanggal_terbit' => 'required',
            'nib' => 'required',
        ]);

        $kode_dokumen = hash('crc32', $this->generateNumber());

        $array = array(
            'user_id' => $user->id,
            'kode_dokumen' => $kode_dokumen,
            'tanggal_terbit' => $request['tanggal_terbit'],
        );

        if($nib = $request->file('nib')){
            $destination_path = 'eproc/nomor-induk-berusaha/';
            $nib2 = date('YmdHis').$nib->getClientOriginalName();
            $nib->move($destination_path, $nib2);
            $array['nib'] = $nib2;
        }

        $surat_keterangan_domisili_perusahaan = NomorIndukBerusaha::create($array);
        
        return back()->with('success', 'Data has been created at '.$surat_keterangan_domisili_perusahaan->created_at);
    }

    public function putNomorIndukBerusaha(Request $request, $id){
        $request->validate([
            'tanggal_terbit' => 'required',
        ]);

        $surat_keterangan_domisili_perusahaan = NomorIndukBerusaha::find(Crypt::decrypt($id));

        if($nib = $request->file('nib')){
            $destination_path = 'eproc/nomor-induk-berusaha/';
            $nib2 = date('YmdHis').$nib->getClientOriginalName();
            $nib->move($destination_path, $nib2);
            $surat_keterangan_domisili_perusahaan['nib'] = $nib2;
        }

        $surat_keterangan_domisili_perusahaan->update([
            'tanggal_terbit' => $request['tanggal_terbit'],
        ]);
        
        return back()->with('success', 'Data has been updated at '.$surat_keterangan_domisili_perusahaan->updated_at);
    }

    public function deleteNomorIndukBerusaha($id){
        $surat_keterangan_domisili_perusahaan = NomorIndukBerusaha::find(Crypt::decrypt($id));
        $surat_keterangan_domisili_perusahaan->delete();

        return back()->with('success', 'Data has been deleted at '.Carbon::now()->toDateTimeString());
    }

    public function generateNumber(){
        do{
            $kode_dokumen = mt_rand(999999999, 9999999999);
        }while(NomorIndukBerusaha::where("kode_dokumen", "=", $kode_dokumen)->first());

        return $kode_dokumen;
    }
}
