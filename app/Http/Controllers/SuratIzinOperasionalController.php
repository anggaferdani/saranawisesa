<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SuratIzinOperasional;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class SuratIzinOperasionalController extends Controller
{
    public function postSuratIzinOperasional(Request $request){
        $user = User::find(Auth::id());

        $request->validate([
            'nama_sio' => 'required',
            'no_sio' => 'required',
            'tanggal_terbit' => 'required',
            'tanggal_jatuh_tempo' => 'required',
            'penerbit_sio' => 'required',
            'sio' => 'required',
        ]);

        $kode_dokumen = hash('crc32', $this->generateNumber());

        $array = array(
            'user_id' => $user->id,
            'kode_dokumen' => $kode_dokumen,
            'nama_sio' => $request['nama_sio'],
            'no_sio' => $request['no_sio'],
            'tanggal_terbit' => $request['tanggal_terbit'],
            'tanggal_jatuh_tempo' => $request['tanggal_jatuh_tempo'],
            'penerbit_sio' => $request['penerbit_sio'],
        );

        if($sio = $request->file('sio')){
            $destination_path = 'eproc/surat-izin-operasional/';
            $sio2 = date('YmdHis').$sio->getClientOriginalName();
            $sio->move($destination_path, $sio2);
            $array['sio'] = $sio2;
        }

        $surat_izin_operasional = SuratIzinOperasional::create($array);
        
        return back()->with('success', 'Data has been created at '.$surat_izin_operasional->created_at);
    }

    public function putSuratIzinOperasional(Request $request, $id){
        $request->validate([
            'nama_sio' => 'required',
            'no_sio' => 'required',
            'tanggal_terbit' => 'required',
            'tanggal_jatuh_tempo' => 'required',
            'penerbit_sio' => 'required',
        ]);

        $surat_izin_operasional = SuratIzinOperasional::find(Crypt::decrypt($id));

        if($sio = $request->file('sio')){
            $destination_path = 'eproc/surat-izin-operasional/';
            $sio2 = date('YmdHis').$sio->getClientOriginalName();
            $sio->move($destination_path, $sio2);
            $surat_izin_operasional['sio'] = $sio2;
        }

        $surat_izin_operasional->update([
            'nama_sio' => $request['nama_sio'],
            'no_sio' => $request['no_sio'],
            'tanggal_terbit' => $request['tanggal_terbit'],
            'tanggal_jatuh_tempo' => $request['tanggal_jatuh_tempo'],
            'penerbit_sio' => $request['penerbit_sio'],
        ]);
        
        return back()->with('success', 'Data has been updated at '.$surat_izin_operasional->updated_at);
    }

    public function deleteSuratIzinOperasional($id){
        $surat_izin_operasional = SuratIzinOperasional::find(Crypt::decrypt($id));
        $surat_izin_operasional->delete();

        return back()->with('success', 'Data has been deleted at '.Carbon::now()->toDateTimeString());
    }

    public function generateNumber(){
        do{
            $kode_dokumen = mt_rand(999999999, 9999999999);
        }while(SuratIzinOperasional::where("kode_dokumen", "=", $kode_dokumen)->first());

        return $kode_dokumen;
    }
}
