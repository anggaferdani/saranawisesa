<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\AktaPendirian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AktaPendirianController extends Controller
{
    public function postAktaPendirian(Request $request){
        $user = User::find(Auth::id());

        $request->validate([
            'no_akta' => 'required',
            'tanggal_akta' => 'required',
            'nama_notaris' => 'required',
            'akta' => 'required',
            'no_sk' => 'required',
            'tanggal_sk' => 'required',
            'akta' => 'required',
            'sk' => 'required',
        ]);

        $kode_dokumen = hash('crc32', $this->generateNumber());

        $array = array(
            'user_id' => $user->id,
            'kode_dokumen' => $kode_dokumen,
            'no_akta' => $request['no_akta'],
            'tanggal_akta' => $request['tanggal_akta'],
            'nama_notaris' => $request['nama_notaris'],
            'no_sk' => $request['no_sk'],
            'tanggal_sk' => $request['tanggal_sk'],
        );

        if($akta = $request->file('akta')){
            $destination_path = 'eproc/akta-pendirian/akta/';
            $akta2 = date('YmdHis').$akta->getClientOriginalName();
            $akta->move($destination_path, $akta2);
            $array['akta'] = $akta2;
        }

        if($sk = $request->file('sk')){
            $destination_path = 'eproc/akta-pendirian/sk/';
            $sk2 = date('YmdHis').$sk->getClientOriginalName();
            $sk->move($destination_path, $sk2);
            $array['sk'] = $sk2;
        }

        $akta_pendirian = AktaPendirian::create($array);
        
        return back()->with('success', 'Data has been created at '.$akta_pendirian->created_at);
    }

    public function putAktaPendirian(Request $request, $id){
        $akta_pendirian = AktaPendirian::find(Crypt::decrypt($id));

        $request->validate([
            'no_akta' => 'required',
            'tanggal_akta' => 'required',
            'nama_notaris' => 'required',
            'akta' => 'required',
            'no_sk' => 'required',
            'tanggal_sk' => 'required',
        ]);

        if($akta = $request->file('akta')){
            $destination_path = 'eproc/akta-pendirian/akta/';
            $akta2 = date('YmdHis').$akta->getClientOriginalName();
            $akta->move($destination_path, $akta2);
            $akta_pendirian['akta'] = $akta2;
        }

        if($sk = $request->file('sk')){
            $destination_path = 'eproc/akta-pendirian/sk/';
            $sk2 = date('YmdHis').$sk->getClientOriginalName();
            $sk->move($destination_path, $sk2);
            $akta_pendirian['sk'] = $sk2;
        }

        $akta_pendirian->update([
            'no_akta' => $request['no_akta'],
            'tanggal_akta' => $request['tanggal_akta'],
            'nama_notaris' => $request['nama_notaris'],
            'no_sk' => $request['no_sk'],
            'tanggal_sk' => $request['tanggal_sk'],
        ]);
        
        return back()->with('success', 'Data has been updated at '.$akta_pendirian->updated_at);
    }

    public function deleteAktaPendirian($id){
        $akta_pendirian = AktaPendirian::find(Crypt::decrypt($id));
        $akta_pendirian->delete();

        return back()->with('success', 'Data has been deleted at '.Carbon::now()->toDateTimeString());
    }

    public function generateNumber(){
        do{
            $kode_dokumen = mt_rand(999999999, 9999999999);
        }while(AktaPendirian::where("kode_dokumen", "=", $kode_dokumen)->first());

        return $kode_dokumen;
    }
}
