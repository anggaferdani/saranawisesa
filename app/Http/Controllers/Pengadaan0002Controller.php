<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lelang;
use App\Models\Lampiran;
use App\Models\UserLelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class Pengadaan0002Controller extends Controller
{
    public function index(){
        $user = User::find(Auth::id());
        $lelangs = $user->lelangs()->paginate(10);
        // dd($lelangs);
        return view('eproc.pengadaan0002.index', compact('lelangs'));
    }

    public function show($id){
        $lelang = Lelang::with('jenis_pengadaans')->find(Crypt::decrypt($id));
        $lampiran = Lampiran::where('lelang_id', $lelang->id)->where('user_id', Auth::id())->first();
        return view('eproc.pengadaan0002.show', compact(
            'lelang',
            'lampiran',
        ));
    }

    public function edit($id){
        $lelang = Lelang::find(Crypt::decrypt($id));
        $lampiran = Lampiran::where('lelang_id', $lelang->id)->where('user_id', Auth::id())->first();
        return view('eproc.pengadaan0002.edit', compact(
            'lelang',
            'lampiran',
        ));
    }

    public function update(Request $request, $id){
        $lampiran = Lampiran::where('lelang_id', Crypt::decrypt($id))->where('user_id', Auth::id())->first();

        $request->validate([
            'penawaran' => 'required_without_all:konsep,penawaran_dan_konsep',
            'konsep' => 'required_without_all:penawaran,penawaran_dan_konsep',
            'penawaran_dan_konsep' => 'required_without_all:penawaran,konsep',
        ]);

        if($penawaran = $request->file('penawaran')){
            $destination_path = 'eproc/lampiran/penawaran/';
            $penawaran0002 = date('YmdHis').rand(999999999, 9999999999).$penawaran->getClientOriginalName();
            $penawaran->move($destination_path, $penawaran0002);
            $array['penawaran'] = $penawaran0002;
            $lampiran->update($array);
        }

        if($konsep = $request->file('konsep')){
            $destination_path = 'eproc/lampiran/konsep/';
            $konsep0002 = date('YmdHis').rand(999999999, 9999999999).$konsep->getClientOriginalName();
            $konsep->move($destination_path, $konsep0002);
            $array['konsep'] = $konsep0002;
            $lampiran->update($array);
        }

        if($penawaran_dan_konsep = $request->file('penawaran_dan_konsep')){
            $destination_path = 'eproc/lampiran/penawaran-dan-konsep/';
            $penawaran_dan_konsep0002 = date('YmdHis').rand(999999999, 9999999999).$penawaran_dan_konsep->getClientOriginalName();
            $penawaran_dan_konsep->move($destination_path, $penawaran_dan_konsep0002);
            $array['penawaran_dan_konsep'] = $penawaran_dan_konsep0002;
            $lampiran->update($array);
        }
        
        return redirect()->route('eproc.perusahaan.pengadaan.index')->with('success', 'Data has been updated at '.$lampiran->created_at);
    }

    public function destroy($id){
        $user_lelang = UserLelang::where('lelang_id', Crypt::decrypt($id))->where('user_id', Auth::id())->first();
        $user_lelang->delete();

        return redirect()->route('eproc.perusahaan.pengadaan.index')->with('success', 'Canceling the auction');
    }
}
