<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\NomorPokokWajibPajak;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class NomorPokokWajibPajakController extends Controller
{
    public function postNomorPokokWajibPajak(Request $request){
        $user = User::find(Auth::id());

        $request->validate([
            'npwp' => 'required',
        ]);

        $kode_dokumen = hash('crc32', $this->generateNumber());

        $array = array(
            'user_id' => $user->id,
            'kode_dokumen' => $kode_dokumen,
        );

        if($npwp = $request->file('npwp')){
            $destination_path = 'eproc/nomor-pokok-wajib-pajak/';
            $npwp2 = date('YmdHis').$npwp->getClientOriginalName();
            $npwp->move($destination_path, $npwp2);
            $array['npwp'] = $npwp2;
        }

        $nomor_pokok_wajib_pajak = NomorPokokWajibPajak::create($array);
        
        return back()->with('success', 'Data has been created at '.$nomor_pokok_wajib_pajak->created_at);
    }

    public function putNomorPokokWajibPajak(Request $request, $id){
        $nomor_pokok_wajib_pajak = NomorPokokWajibPajak::find(Crypt::decrypt($id));

        if($npwp = $request->file('npwp')){
            $destination_path = 'eproc/nomor-pokok-wajib-pajak/';
            $npwp2 = date('YmdHis').$npwp->getClientOriginalName();
            $npwp->move($destination_path, $npwp2);
            $nomor_pokok_wajib_pajak['npwp'] = $npwp2;
        }

        $nomor_pokok_wajib_pajak->update([
            'tanggal_terbit' => $request['tanggal_terbit'],
        ]);
        
        return back()->with('success', 'Data has been updated at '.$nomor_pokok_wajib_pajak->updated_at);
    }

    public function deleteNomorPokokWajibPajak($id){
        $nomor_pokok_wajib_pajak = NomorPokokWajibPajak::find(Crypt::decrypt($id));
        $nomor_pokok_wajib_pajak->delete();

        return back()->with('success', 'Data has been deleted at '.Carbon::now()->toDateTimeString());
    }

    public function generateNumber(){
        do{
            $kode_dokumen = mt_rand(999999999, 9999999999);
        }while(NomorPokokWajibPajak::where("kode_dokumen", "=", $kode_dokumen)->first());

        return $kode_dokumen;
    }
}
