<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\JadwalLelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class JadwalLelangController extends Controller
{
    public function index($lelang_id){
        $lelang = Lelang::find(Crypt::decrypt($lelang_id));
        $jadwal_lelangs = JadwalLelang::where('lelang_id', $lelang->id)->where('status_aktif', 'aktif')->latest()->paginate(10);;
        return view('pages.jadwal-lelang.index', compact('lelang', 'jadwal_lelangs'));
    }

    public function create($lelang_id){
        $lelang = Lelang::find(Crypt::decrypt($lelang_id));
        return view('pages.jadwal-lelang.create', compact('lelang'));
    }

    public function store(Request $request, $lelang_id){
        $lelang = Lelang::find(Crypt::decrypt($lelang_id));
        
        $request->validate([
            'nama_kegiatan_lelang' => 'required',
            'tanggal_mulai_kegiatan_lelang' => 'required|after:yesterday',
            'tanggal_akhir_kegiatan_lelang' => 'required|after:yesterday',
        ]);
        
        $array = array(
            'lelang_id' => $lelang->id,
            'nama_kegiatan_lelang' => $request['nama_kegiatan_lelang'],
            'tanggal_mulai_kegiatan_lelang' => $request['tanggal_mulai_kegiatan_lelang'],
            'tanggal_akhir_kegiatan_lelang' => $request['tanggal_akhir_kegiatan_lelang'],
        );

        $jadwal_lelang = JadwalLelang::create($array);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.jadwal-lelang.index', $lelang_id)->with('success', 'Berhasil ditambahkan pada : '.$jadwal_lelang->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.jadwal-lelang.index', $lelang_id)->with('success', 'Berhasil ditambahkan pada : '.$jadwal_lelang->created_at);
        }
    }

    public function show($lelang_id, $id){
        $lelang = Lelang::find(Crypt::decrypt($lelang_id));
        $jadwal_lelang = JadwalLelang::find(Crypt::decrypt($id));
        return view('pages.jadwal-lelang.show', compact('lelang', 'jadwal_lelang'));
    }

    public function edit($lelang_id, $id){
        $lelang = Lelang::find(Crypt::decrypt($lelang_id));
        $jadwal_lelang = JadwalLelang::find(Crypt::decrypt($id));
        return view('pages.jadwal-lelang.edit', compact('lelang', 'jadwal_lelang'));
    }

    public function update(Request $request, $lelang_id, $id){
        $lelang = Lelang::find(Crypt::decrypt($lelang_id));
        $jadwal_lelang = JadwalLelang::find(Crypt::decrypt($id));

        $request->validate([
            'nama_kegiatan_lelang' => 'required',
            'tanggal_mulai_kegiatan_lelang' => 'required|after:yesterday',
            'tanggal_akhir_kegiatan_lelang' => 'required|after:yesterday',
        ]);
        
        $jadwal_lelang->update([
            'nama_kegiatan_lelang' => $request['nama_kegiatan_lelang'],
            'tanggal_mulai_kegiatan_lelang' => $request['tanggal_mulai_kegiatan_lelang'],
            'tanggal_akhir_kegiatan_lelang' => $request['tanggal_akhir_kegiatan_lelang'],
        ]);
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.jadwal-lelang.index', $lelang_id)->with('success', 'Berhasil dilakukan perubahan pada : '.$jadwal_lelang->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.jadwal-lelang.index', $lelang_id)->with('success', 'Berhasil dilakukan perubahan pada : '.$jadwal_lelang->created_at);
        }
    }

    public function destroy($lelang_id, $id){
        $lelang = Lelang::find(Crypt::decrypt($lelang_id));
        $jadwal_lelang = JadwalLelang::find(Crypt::decrypt($id));
        
        $jadwal_lelang->update([
            'status_aktif' => 'tidak aktif',
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.jadwal-lelang.index', $lelang_id)->with('success', 'Berhasil dihapus pada : '.$jadwal_lelang->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.jadwal-lelang.index', $lelang_id)->with('success', 'Berhasil dihapus pada : '.$jadwal_lelang->created_at);
        }
    }
}
