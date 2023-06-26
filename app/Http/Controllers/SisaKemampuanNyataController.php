<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SisaKemampuanNyata;
use Illuminate\Support\Facades\Crypt;

class SisaKemampuanNyataController extends Controller
{
    public function edit($user_id){
        $sisa_kemampuan_nyata = SisaKemampuanNyata::where('user_id', Crypt::decrypt($user_id))->first();
        return view('eproc.sisa-kemampuan-nyata.edit', compact('sisa_kemampuan_nyata'));
    }

    public function update(Request $request, $user_id){
        $sisa_kemampuan_nyata = SisaKemampuanNyata::where('user_id', Crypt::decrypt($user_id))->first();

        $nilai = preg_replace('/\D/', '', $request->kekayaan_bersih);
        $nilai_kontrak = trim($nilai);

        $nilai0002 = preg_replace('/\D/', '', $request->modal_kerja);
        $modal_kerja = trim($nilai0002);

        $nilai0003 = preg_replace('/\D/', '', $request->kemampuan_nyata);
        $kemampuan_nyata = trim($nilai0003);

        $nilai0004 = preg_replace('/\D/', '', $request->sisa_kemampuan_nyata);
        $sisa_kemampuan_nyata0002 = trim($nilai0004);
        
        $sisa_kemampuan_nyata->update([
            'kekayaan_bersih' => $request->kekayaan_bersih,
            'modal_kerja' => $request->modal_kerja,
            'kemampuan_nyata' => $request->kemampuan_nyata,
            'sisa_kemampuan_nyata' => $request->sisa_kemampuan_nyata0002,
        ]);

        return back()->with('success', 'Data has been updated at '.$sisa_kemampuan_nyata->created_at);
    }
}
