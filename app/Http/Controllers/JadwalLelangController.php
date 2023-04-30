<?php

namespace App\Http\Controllers;

use App\Models\JadwalLelang;
use App\Models\Lelang;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class JadwalLelangController extends Controller
{
    public function index($lelang_id){
        $lelang = Lelang::find($lelang_id);
        $jadwal_lelang = JadwalLelang::all();
        return view('pages.jadwal-lelang.index', compact('lelang', 'jadwal_lelang'));
    }

    public function create($lelang_id){
        $lelang = Lelang::find($lelang_id);
        return view('pages.jadwal-lelang.create', compact('lelang'));
    }

    public function store(Request $request, $lelang_id){
        $lelang = Lelang::find($lelang_id);
        $request->validate([
            'tanggal_maksimal_lelang' => 'required',
            'nama_lelang' => 'required',
            'tanggal_mulai_lelang' => 'required|after:yesterday',
            'tanggal_akhir_lelang' => 'required|after:yesterday|before:tanggal_maksimal_lelang',
        ]);
        
        $input_array_jadwal_lelang = array(
            'lelang_id' => $lelang->id,
            'tanggal_maksimal_lelang' => $request['tanggal_maksimal_lelang'],
            'nama_lelang' => $request['nama_lelang'],
            'tanggal_mulai_lelang' => $request['tanggal_mulai_lelang'],
            'tanggal_akhir_lelang' => $request['tanggal_akhir_lelang'],
        );

        $jadwal_lelang = JadwalLelang::create($input_array_jadwal_lelang);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.jadwal-lelang.index', $lelang->id)->with('success', 'Berhasil ditambahkan pada : '.$jadwal_lelang->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.jadwal-lelang.index', $lelang->id)->with('success', 'Berhasil ditambahkan pada : '.$jadwal_lelang->created_at);
        }
    }

    public function show($lelang_id, $id){
        $lelang = Lelang::find($lelang_id);
        $jadwal_lelang = JadwalLelang::find($id);
        return view('pages.jadwal-lelang.show', compact('lelang', 'jadwal_lelang'));
    }

    public function edit($lelang_id, $id){
        $lelang = Lelang::find($lelang_id);
        $jadwal_lelang = JadwalLelang::find($id);
        return view('pages.jadwal-lelang.edit', compact('lelang', 'jadwal_lelang'));
    }

    public function update(Request $request, $lelang_id, $id){
        $lelang = Lelang::find($lelang_id);
        $jadwal_lelang = JadwalLelang::find($id);

        $request->validate([
            'nama_lelang' => 'required',
            'tanggal_mulai_lelang' => 'required',
            'tanggal_akhir_lelang' => 'required',
        ]);
        
        $jadwal_lelang->update([
            'nama_lelang' => $request->nama_lelang,
            'tanggal_mulai_lelang' => $request->tanggal_mulai_lelang,
            'tanggal_akhir_lelang' => $request->tanggal_akhir_lelang,
        ]);
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.jadwal-lelang.index', $lelang->id)->with('success', 'Berhasil dilakukan perubahan pada : '.$jadwal_lelang->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.jadwal-lelang.index', $lelang->id)->with('success', 'Berhasil dilakukan perubahan pada : '.$jadwal_lelang->created_at);
        }
    }

    public function destroy($lelang_id, $id){
        $lelang = Lelang::find($lelang_id);
        $jadwal_lelang = JadwalLelang::find($id);
        
        $jadwal_lelang->update([
            'status_aktif' => 2,
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.jadwal-lelang.index', $lelang->id)->with('success', 'Berhasil dihapus pada : '.$jadwal_lelang->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.jadwal-lelang.index', $lelang->id)->with('success', 'Berhasil dihapus pada : '.$jadwal_lelang->created_at);
        }
    }
}
