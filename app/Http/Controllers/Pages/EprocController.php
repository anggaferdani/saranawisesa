<?php

namespace App\Http\Controllers\Pages;

use App\Models\User;
use App\Models\Berita;
use App\Models\Lelang;
use App\Models\Setting;
use App\Models\Lampiran;
use App\Models\Perusahaan;
use App\Models\Kualifikasi;
use Illuminate\Support\Str;
use App\Models\Administrasi;
use Illuminate\Http\Request;
use App\Models\JenisPengadaan;
use App\Models\ProfilePerusahaan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EprocController extends Controller
{
    public function beranda(){
        $profile_perusahaan = ProfilePerusahaan::first();
        $setting = Setting::first();
        return view('pages.eproc.beranda', compact(
            'profile_perusahaan',
            'setting',
        ));
    }

    public function pengadaan(){
        // Joy's
        $jenisPengadaansGroupByLelang   = JenisPengadaan::with(["lelangs" => function ($query) { $query->where("status_pengadaan", "lelang"); }])->whereHas("lelangs", function ($query) { $query->where("status_pengadaan", "lelang"); })->get();
        $jenisPengadaansGroupByLangsung = JenisPengadaan::with(["lelangs" => function ($query) { $query->where("status_pengadaan", "penunjukan_langsung"); }])->whereHas("lelangs", function ($query) { $query->where("status_pengadaan", "penunjukan_langsung"); })->get();
        
        // Angga's
        $profile_perusahaan = ProfilePerusahaan::first();
        $jenis_pengadaan = JenisPengadaan::with('lelangs')->whereHas("lelangs", function ($query) { $query->where("id", "!=", null); })->get();
        $setting = Setting::first();

        $lelangs = Lelang::select('status_pengadaan')->get();
        $lelang = Str::contains($lelangs, 'lelang');
        $penunjukan_langsung = Str::contains($lelangs, 'penunjukan_langsung');

        return view('pages.eproc.pengadaan', compact(
            'profile_perusahaan',
            'jenis_pengadaan',
            'setting',
            'lelang',
            'penunjukan_langsung',
            'jenisPengadaansGroupByLelang',
            'jenisPengadaansGroupByLangsung',
        ));
    }

    public function detail_pengadaan($id){
        $profile_perusahaan = ProfilePerusahaan::first();
        $setting = Setting::first();
        $lelang = Lelang::with('perusahaans', 'jadwal_lelangs')->find($id);

        if (Auth::guest()) {
            $perusahaan = null;
        } else {
            $perusahaan = Perusahaan::with('lelangs', 'users')->where('user_id', Auth::user()->id)->first();
        }

        $perusahaan_id = Perusahaan::where('lelang_id', $lelang->id)->first();

        if(empty($perusahaan_id)){
            return view('pages.eproc.detail-pengadaan', compact(
                'profile_perusahaan',
                'setting',
                'lelang',
                'perusahaan',
                'perusahaan_id',
            ));
        }else{
            $kualifikasi = Kualifikasi::where('perusahaan_id', $perusahaan_id->id)->first();
    
            return view('pages.eproc.detail-pengadaan', compact(
                'profile_perusahaan',
                'setting',
                'lelang',
                'perusahaan',
                'perusahaan_id',
                'kualifikasi',
            ));
        }

    }

    public function ikut_pengadaan($id){
        $perusahaan = Perusahaan::where('user_id', Auth::user()->id)->first();

        $perusahaan->update([
            'lelang_id' => $id,
        ]);

        return back();
    }

    public function kirim_lampiran(Request $request){
        $request->validate([
            'lelang_id' => 'required',
            'perusahaan_id' => 'required',
            'penawaran' => 'required_without_all:konsep, penawaran_dan_konsep',
            'konsep' => 'required_without_all:penawaran, penawaran_dan_konsep',
            'penawaran_dan_konsep' => 'required_without_all:penawaran, konsep',
        ]);

        $input_array_lampiran = array(
            'lelang_id' => $request['lelang_id'],
            'perusahaan_id' => $request['perusahaan_id'],
        );

        if($penawaran = $request->file('penawaran')){
            $destination_path = 'lampiran/penawaran/';
            $file_penawaran = date('YmdHis') . "." . $penawaran->getClientOriginalExtension();
            $penawaran->move($destination_path, $file_penawaran);
            $input_array_lampiran['penawaran'] = $file_penawaran;
        }

        if($konsep = $request->file('konsep')){
            $destination_path = 'lampiran/konsep/';
            $file_konsep = date('YmdHis') . "." . $konsep->getClientOriginalExtension();
            $konsep->move($destination_path, $file_konsep);
            $input_array_lampiran['konsep'] = $file_konsep;
        }

        if($penawaran_dan_konsep = $request->file('penawaran_dan_konsep')){
            $destination_path = 'lampiran/penawaran-dan-konsep/';
            $file_penawaran_dan_konsep = date('YmdHis') . "." . $penawaran_dan_konsep->getClientOriginalExtension();
            $penawaran_dan_konsep->move($destination_path, $file_penawaran_dan_konsep);
            $input_array_lampiran['penawaran_dan_konsep'] = $file_penawaran_dan_konsep;
        }

        $lampiran = Lampiran::create($input_array_lampiran);

        return redirect()->back()->with('success', 'Berhasil ditambahkan pada : '.$lampiran->created_at.' Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, omnis laborum in quidem consequuntur at nostrum saepe atque, deserunt non sequi sit totam iure dolores eos ipsam fugit aperiam odio.');
    }

    public function berita(){
        $profile_perusahaan = ProfilePerusahaan::first();
        $setting = Setting::first();
        $berita = Berita::all();
        return view('pages.eproc.berita', compact(
            'profile_perusahaan',
            'setting',
            'berita',
        ));
    }

    public function kontak_kami(){
        $profile_perusahaan = ProfilePerusahaan::first();
        $setting = Setting::first();
        return view('pages.eproc.kontak-kami', compact(
            'profile_perusahaan',
            'setting',
        ));
    }
    
    public function kualifikasi($user_id){
        return view('pages.authentications.eproc.kualifikasi', compact('user_id'));
    }

    public function kirim_kualifikasi(Request $request){
        $request->validate([
            'user_id' => 'required',

            'administrasi_nama_badan_usaha' => 'required',
            'administrasi_status_badan_usaha' => 'required',
            'administrasi_bukti_kepemilikan_tempat_usaha' => 'required',

            'akta_pendirian_perusahaan_nomor' => 'required',
            'akta_pendirian_perusahaan_tanggal' => 'required',
            'akta_pendirian_perusahaan_nama_notaris' => 'required',
            'akta_pendirian_perusahaan_nomor_pengesahan' => 'required',

            'komisaris_untuk_pt_nama' => 'required',
            'komisaris_untuk_pt_ktp_paspor_keterangan_domisili_tinggal' => 'required',
            'komisaris_untuk_pt_jabatan_dalam_badan_usaha' => 'required',
            'direksi_pengurus_badan_usaha_nama' => 'required',
            'direksi_pengurus_badan_usaha_ktp' => 'required',
            'direksi_pengurus_badan_usaha_jabatan_dalam_badan_usaha' => 'required',

            'tdp_surat_izin_usaha' => 'required',
            'tdp_surat_masa_berlaku_izin_usaha' => 'required',
            'tdp_instansi_pemberi_izin_usaha' => 'required',
            'tdp_kualifikasi_usaha' => 'required',
            'tdp_klasifikasi_usaha' => 'required',
            'tdp_no_tdp' => 'required',

            'susunan_kepemilikan_saham_nama' => 'required',
            'susunan_kepemilikan_saham_ktp' => 'required',
            'susunan_kepemilikan_saham_alamat' => 'required',
            'susunan_kepemilikan_saham_persentase' => 'required',

            'pajak_nomor_pokok_wajib_pajak' => 'required',
            'pajak_bukti_laporan_pajak_tahun_terakhir' => 'required',

            'pengalaman_perusahaan_nama_paket_pekerjaan' => 'required',
            'pengalaman_perusahaan_kelompok' => 'required',
            'pengalaman_perusahaan_ringkasan_lingkup_pekerjaan' => 'required',
            'pengalaman_perusahaan_lokasi' => 'required',
            'pengalaman_perusahaan_pemberi_pekerjaan_nama' => 'required',
            'pengalaman_perusahaan_pemberi_pekerjaan_alamat' => 'required',
            'pengalaman_perusahaan_kontrak_tanggal' => 'required',
            'pengalaman_perusahaan_kontrak_nilai' => 'required',
            'pengalaman_perusahaan_status_penyedia_pekerjaan' => 'required',
            'pengalaman_perusahaan_tanggal_berdasarkan_kontrak' => 'required',
            'pengalaman_perusahaan_tanggal_berdasarkan_ba_serah_terima' => 'required',

            'pekerjaan_yang_dilaksanakan_nama_paket_pekerjaan' => 'required',
            'pekerjaan_yang_dilaksanakan_ringkasan_lingkup_pekerjaan' => 'required',
            'pekerjaan_yang_dilaksanakan_lokasi' => 'required',
            'pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_nama' => 'required',
            'pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_alamat' => 'required',
            'pekerjaan_yang_dilaksanakan_status_penyedia' => 'required',
            'pekerjaan_yang_dilaksanakan_kontrak_tanggal' => 'required',
            'pekerjaan_yang_dilaksanakan_kontrak_nilai' => 'required',
            'pekerjaan_yang_dilaksanakan_progres_terakhir_kontrak' => 'required',
            'pekerjaan_yang_dilaksanakan_progres_terakhir_prestasi_kerja' => 'required',
            
            'skn_kekayaan_bersih' => 'required',
            'skn_modal_kerja' => 'required',
            'skn_kemampuan_nyata' => 'required',
            'skn_sisa_kemampuan_nyata' => 'required',

            'terms_and_conditions' => 'accepted',
        ]);

        $input_array_perusahaan = array(
            'user_id' => $request['user_id'],
        );

        $perusahaan = Perusahaan::create($input_array_perusahaan);

        $var_pengalaman_perusahaan_kontrak_nilai = preg_replace('/\D/', '', $request->pengalaman_perusahaan_kontrak_nilai);
        $pengalaman_perusahaan_kontrak_nilai = trim($var_pengalaman_perusahaan_kontrak_nilai);

        $var_pekerjaan_yang_dilaksanakan_kontrak_nilai = preg_replace('/\D/', '', $request->pekerjaan_yang_dilaksanakan_kontrak_nilai);
        $pekerjaan_yang_dilaksanakan_kontrak_nilai = trim($var_pekerjaan_yang_dilaksanakan_kontrak_nilai);

        $var_skn_kekayaan_bersih = preg_replace('/\D/', '', $request->skn_kekayaan_bersih);
        $skn_kekayaan_bersih = trim($var_skn_kekayaan_bersih);

        $var_skn_modal_kerja = preg_replace('/\D/', '', $request->skn_modal_kerja);
        $skn_modal_kerja = trim($var_skn_modal_kerja);

        $var_skn_kemampuan_nyata = preg_replace('/\D/', '', $request->skn_kemampuan_nyata);
        $skn_kemampuan_nyata = trim($var_skn_kemampuan_nyata);

        $var_skn_sisa_kemampuan_nyata = preg_replace('/\D/', '', $request->skn_sisa_kemampuan_nyata);
        $skn_sisa_kemampuan_nyata = trim($var_skn_sisa_kemampuan_nyata);

        $input_array_kualifikasi = array(
            'perusahaan_id' => $perusahaan->id,
            
            'administrasi_nama_badan_usaha' => $request['administrasi_nama_badan_usaha'],
            'administrasi_status_badan_usaha' => $request['administrasi_status_badan_usaha'],
            'administrasi_alamat_kantor_pusat' => $request['administrasi_alamat_kantor_pusat'],
            'administrasi_no_telepon_pusat' => $request['administrasi_no_telepon_pusat'],
            'administrasi_no_fax_pusat' => $request['administrasi_no_fax_pusat'],
            'administrasi_email_pusat' => $request['administrasi_email_pusat'],
            'administrasi_alamat_kantor_cabang' => $request['administrasi_alamat_kantor_cabang'],
            'administrasi_no_telepon_cabang' => $request['administrasi_no_telepon_cabang'],
            'administrasi_no_fax_cabang' => $request['administrasi_no_fax_cabang'],
            'administrasi_email_cabang' => $request['administrasi_email_cabang'],

            'akta_pendirian_perusahaan_nomor' => $request['akta_pendirian_perusahaan_nomor'],
            'akta_pendirian_perusahaan_tanggal' => $request['akta_pendirian_perusahaan_tanggal'],
            'akta_pendirian_perusahaan_nama_notaris' => $request['akta_pendirian_perusahaan_nama_notaris'],
            'akta_pendirian_perusahaan_nomor_pengesahan' => $request['akta_pendirian_perusahaan_nomor_pengesahan'],
            'perubahan_terakhir_akta_pendirian_perusahaan_nomor' => $request['perubahan_terakhir_akta_pendirian_perusahaan_nomor'],
            'perubahan_terakhir_akta_pendirian_perusahaan_tanggal' => $request['perubahan_terakhir_akta_pendirian_perusahaan_tanggal'],
            'perubahan_terakhir_akta_pendirian_perusahaan_nama_notaris' => $request['perubahan_terakhir_akta_pendirian_perusahaan_nama_notaris'],

            'komisaris_untuk_pt_nama' => $request['komisaris_untuk_pt_nama'],
            'komisaris_untuk_pt_ktp_paspor_keterangan_domisili_tinggal' => $request['komisaris_untuk_pt_ktp_paspor_keterangan_domisili_tinggal'],
            'komisaris_untuk_pt_jabatan_dalam_badan_usaha' => $request['komisaris_untuk_pt_jabatan_dalam_badan_usaha'],
            'direksi_pengurus_badan_usaha_nama' => $request['direksi_pengurus_badan_usaha_nama'],
            'direksi_pengurus_badan_usaha_ktp' => $request['direksi_pengurus_badan_usaha_ktp'],
            'direksi_pengurus_badan_usaha_jabatan_dalam_badan_usaha' => $request['direksi_pengurus_badan_usaha_jabatan_dalam_badan_usaha'],

            'tdp_instansi_pemberi_izin_usaha' => $request['tdp_instansi_pemberi_izin_usaha'],
            'tdp_surat_masa_berlaku_izin_usaha' => $request['tdp_surat_masa_berlaku_izin_usaha'],
            'tdp_kualifikasi_usaha' => $request['tdp_kualifikasi_usaha'],
            'tdp_klasifikasi_usaha' => $request['tdp_klasifikasi_usaha'],
            'tdp_no_tdp' => $request['tdp_no_tdp'],

            'izin_lainnya_masa_berlaku_izin' => $request['izin_lainnya_masa_berlaku_izin'],
            'izin_lainnya_intansi_pemberi_izin' => $request['izin_lainnya_intansi_pemberi_izin'],

            'susunan_kepemilikan_saham_nama' => $request['susunan_kepemilikan_saham_nama'],
            'susunan_kepemilikan_saham_ktp' => $request['susunan_kepemilikan_saham_ktp'],
            'susunan_kepemilikan_saham_alamat' => $request['susunan_kepemilikan_saham_alamat'],
            'susunan_kepemilikan_saham_persentase' => $request['susunan_kepemilikan_saham_persentase'],

            'pajak_nomor_pokok_wajib_pajak' => $request['pajak_nomor_pokok_wajib_pajak'],

            'data_personalia_nama' => $request['data_personalia_nama'],
            'data_personalia_tanggal_lahir' => $request['data_personalia_tanggal_lahir'],
            'data_personalia_tingkat_pendidikan' => $request['data_personalia_tingkat_pendidikan'],
            'data_personalia_jabatan_dalam_pekerjaan' => $request[''],
            'data_personalia_pengalaman_kerja' => $request['data_personalia_pengalaman_kerja'],
            'data_personalia_profesi_keahlian' => $request['data_personalia_profesi_keahlian'],
            'data_personalia_tahun_sertifikat_ijazah' => $request['data_personalia_tahun_sertifikat_ijazah'],

            'data_fasilitas_jenis_fasilitas' => $request['data_fasilitas_jenis_fasilitas'],
            'data_fasilitas_jumlah' => $request['data_fasilitas_jumlah'],
            'data_fasilitas_kapasitas_pada_saat_ini' => $request['data_fasilitas_kapasitas_pada_saat_ini'],
            'data_fasilitas_merek_dan_tipe' => $request['data_fasilitas_merek_dan_tipe'],
            'data_fasilitas_tahun_pembuatan' => $request['data_fasilitas_tahun_pembuatan'],
            'data_fasilitas_kondisi' => $request['data_fasilitas_kondisi'],
            'data_fasilitas_lokasi_sekarang' => $request['data_fasilitas_lokasi_sekarang'],

            'pengalaman_perusahaan_nama_paket_pekerjaan' => $request['pengalaman_perusahaan_nama_paket_pekerjaan'],
            'pengalaman_perusahaan_kelompok' => $request['pengalaman_perusahaan_kelompok'],
            'pengalaman_perusahaan_ringkasan_lingkup_pekerjaan' => $request['pengalaman_perusahaan_ringkasan_lingkup_pekerjaan'],
            'pengalaman_perusahaan_lokasi' => $request['pengalaman_perusahaan_lokasi'],
            'pengalaman_perusahaan_pemberi_pekerjaan_nama' => $request['pengalaman_perusahaan_pemberi_pekerjaan_nama'],
            'pengalaman_perusahaan_pemberi_pekerjaan_alamat' => $request['pengalaman_perusahaan_pemberi_pekerjaan_alamat'],
            'pengalaman_perusahaan_kontrak_tanggal' => $request['pengalaman_perusahaan_kontrak_tanggal'],
            'pengalaman_perusahaan_kontrak_nilai' => $pengalaman_perusahaan_kontrak_nilai,
            'pengalaman_perusahaan_status_penyedia_pekerjaan' => $request['pengalaman_perusahaan_status_penyedia_pekerjaan'],
            'pengalaman_perusahaan_tanggal_berdasarkan_kontrak' => $request['pengalaman_perusahaan_tanggal_berdasarkan_kontrak'],
            'pengalaman_perusahaan_tanggal_berdasarkan_ba_serah_terima' => $request['pengalaman_perusahaan_tanggal_berdasarkan_ba_serah_terima'],

            'pekerjaan_yang_dilaksanakan_nama_paket_pekerjaan' => $request['pekerjaan_yang_dilaksanakan_nama_paket_pekerjaan'],
            'pekerjaan_yang_dilaksanakan_ringkasan_lingkup_pekerjaan' => $request['pekerjaan_yang_dilaksanakan_ringkasan_lingkup_pekerjaan'],
            'pekerjaan_yang_dilaksanakan_lokasi' => $request['pekerjaan_yang_dilaksanakan_lokasi'],
            'pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_nama' => $request['pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_nama'],
            'pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_alamat' => $request['pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_alamat'],
            'pekerjaan_yang_dilaksanakan_status_penyedia' => $request['pekerjaan_yang_dilaksanakan_status_penyedia'],
            'pekerjaan_yang_dilaksanakan_kontrak_tanggal' => $request['pekerjaan_yang_dilaksanakan_kontrak_tanggal'],
            'pekerjaan_yang_dilaksanakan_kontrak_nilai' => $pekerjaan_yang_dilaksanakan_kontrak_nilai,
            'pekerjaan_yang_dilaksanakan_progres_terakhir_kontrak' => $request['pekerjaan_yang_dilaksanakan_progres_terakhir_kontrak'],
            'pekerjaan_yang_dilaksanakan_progres_terakhir_prestasi_kerja' => $request['pekerjaan_yang_dilaksanakan_progres_terakhir_prestasi_kerja'],
            
            'skn_kekayaan_bersih' => $skn_kekayaan_bersih,
            'skn_modal_kerja' => $skn_modal_kerja,
            'skn_kemampuan_nyata' => $skn_kemampuan_nyata,
            'skn_sisa_kemampuan_nyata' => $skn_sisa_kemampuan_nyata,
        );

        if($administrasi_bukti_kepemilikan_tempat_usaha = $request->file('administrasi_bukti_kepemilikan_tempat_usaha')){
            $destination_path = 'kualifikasi/bukti-kepemilikan-tempat-usaha/'; $file_administrasi_bukti_kepemilikan_tempat_usaha = date('YmdHis') . "." . $administrasi_bukti_kepemilikan_tempat_usaha->getClientOriginalExtension();
            $administrasi_bukti_kepemilikan_tempat_usaha->move($destination_path, $file_administrasi_bukti_kepemilikan_tempat_usaha); $input_array_kualifikasi['administrasi_bukti_kepemilikan_tempat_usaha'] = $file_administrasi_bukti_kepemilikan_tempat_usaha;
        }
        if($tdp_surat_izin_usaha = $request->file('tdp_surat_izin_usaha')){
            $destination_path = 'kualifikasi/surat-izin-usaha/'; $file_tdp_surat_izin_usaha = date('YmdHis') . "." . $tdp_surat_izin_usaha->getClientOriginalExtension();
            $tdp_surat_izin_usaha->move($destination_path, $file_tdp_surat_izin_usaha); $input_array_kualifikasi['tdp_surat_izin_usaha'] = $file_tdp_surat_izin_usaha;
        }
        if($izin_lainnya_surat_izin = $request->file('izin_lainnya_surat_izin')){
            $destination_path = 'kualifikasi/surat-izin-lainnya/'; $file_izin_lainnya_surat_izin = date('YmdHis') . "." . $izin_lainnya_surat_izin->getClientOriginalExtension();
            $izin_lainnya_surat_izin->move($destination_path, $file_izin_lainnya_surat_izin); $input_array_kualifikasi['izin_lainnya_surat_izin'] = $file_izin_lainnya_surat_izin;
        }
        if($pajak_bukti_laporan_pajak_tahun_terakhir = $request->file('pajak_bukti_laporan_pajak_tahun_terakhir')){
            $destination_path = 'kualifikasi/bukti-laporan-pajak-tahun-terakhir/'; $file_pajak_bukti_laporan_pajak_tahun_terakhir = date('YmdHis') . "." . $pajak_bukti_laporan_pajak_tahun_terakhir->getClientOriginalExtension();
            $pajak_bukti_laporan_pajak_tahun_terakhir->move($destination_path, $file_pajak_bukti_laporan_pajak_tahun_terakhir); $input_array_kualifikasi['pajak_bukti_laporan_pajak_tahun_terakhir'] = $file_pajak_bukti_laporan_pajak_tahun_terakhir;
        }
        if($data_fasilitas_bukti_status_kepemilikan = $request->file('data_fasilitas_bukti_status_kepemilikan')){
            $destination_path = 'kualifikasi/bukti-status-kepemilikan/'; $file_data_fasilitas_bukti_status_kepemilikan = date('YmdHis') . "." . $data_fasilitas_bukti_status_kepemilikan->getClientOriginalExtension();
            $data_fasilitas_bukti_status_kepemilikan->move($destination_path, $file_data_fasilitas_bukti_status_kepemilikan); $input_array_kualifikasi['data_fasilitas_bukti_status_kepemilikan'] = $file_data_fasilitas_bukti_status_kepemilikan;
        }

        $kualifikasi = Kualifikasi::create($input_array_kualifikasi);
        
        return redirect()->route('eproc.login')->with('success', 'Isian kualifikasi berhasil ditambahkan pada : '.$kualifikasi->created_at.'. Silakan login');
        // return redirect()->route('eproc.administrasi', $perusahaan->id)->with('success', 'Isian kualifikasi berhasil ditambahkan pada : '.$kualifikasi->created_at);
    }

    // public function administrasi($perusahaan_id){
    //     return view('pages.authentications.eproc.administrasi', compact('perusahaan_id'));
    // }

    // public function kirim_administrasi(Request $request){
    //     $request->validate([
    //         'perusahaan_id' => 'required',
    //     ]);

    //     $input_array_administrasi = array(
    //         'perusahaan_id' => $request['perusahaan_id'],
    //     );

    //     $administrasi = Administrasi::create($input_array_administrasi);
    //     return redirect()->route('eproc.login')->with('success', 'Isian administrasi berhasil ditambahkan pada : '.$administrasi->created_at);
    // }
}
