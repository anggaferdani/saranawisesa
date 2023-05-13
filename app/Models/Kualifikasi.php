<?php

namespace App\Models;

use App\Models\Perusahaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kualifikasi extends Model
{
    use HasFactory;

    protected $table = 'kualifikasis';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'perusahaan_id',

        'administrasi_nama_badan_usaha',
        'administrasi_status_badan_usaha',
        'administrasi_alamat_kantor_pusat',
        'administrasi_no_telepon_pusat',
        'administrasi_no_fax_pusat',
        'administrasi_email_pusat',
        'administrasi_alamat_kantor_cabang',
        'administrasi_no_telepon_cabang',
        'administrasi_no_fax_cabang',
        'administrasi_email_cabang',
        'administrasi_bukti_kepemilikan_tempat_usaha',

        'akta_pendirian_perusahaan_nomor',
        'akta_pendirian_perusahaan_tanggal',
        'akta_pendirian_perusahaan_nama_notaris',
        'akta_pendirian_perusahaan_nomor_pengesahan',
        'perubahan_terakhir_akta_pendirian_perusahaan_nomor',
        'perubahan_terakhir_akta_pendirian_perusahaan_tanggal',
        'perubahan_terakhir_akta_pendirian_perusahaan_nama_notaris',

        'komisaris_untuk_pt_nama',
        'komisaris_untuk_pt_ktp_paspor_keterangan_domisili_tinggal',
        'komisaris_untuk_pt_jabatan_dalam_badan_usaha',
        'direksi_pengurus_badan_usaha_nama',
        'direksi_pengurus_badan_usaha_ktp',
        'direksi_pengurus_badan_usaha_jabatan_dalam_badan_usaha',

        'tdp_surat_izin_usaha',
        'tdp_surat_masa_berlaku_izin_usaha',
        'tdp_instansi_pemberi_izin_usaha',
        'tdp_kualifikasi_usaha',
        'tdp_klasifikasi_usaha',
        'tdp_no_tdp',

        'izin_lainnya_surat_izin',
        'izin_lainnya_masa_berlaku_izin',
        'izin_lainnya_intansi_pemberi_izin',

        'susunan_kepemilikan_saham_nama',
        'susunan_kepemilikan_saham_ktp',
        'susunan_kepemilikan_saham_alamat',
        'susunan_kepemilikan_saham_persentase',

        'pajak_nomor_pokok_wajib_pajak',
        'pajak_bukti_laporan_pajak_tahun_terakhir',

        'data_personalia_nama',
        'data_personalia_tanggal_lahir',
        'data_personalia_tingkat_pendidikan',
        'data_personalia_jabatan_dalam_pekerjaan',
        'data_personalia_pengalaman_kerja',
        'data_personalia_profesi_keahlian',
        'data_personalia_tahun_sertifikat_ijazah',

        'data_fasilitas_jenis_fasilitas',
        'data_fasilitas_jumlah',
        'data_fasilitas_kapasitas_pada_saat_ini',
        'data_fasilitas_merek_dan_tipe',
        'data_fasilitas_tahun_pembuatan',
        'data_fasilitas_kondisi',
        'data_fasilitas_lokasi_sekarang',
        'data_fasilitas_bukti_status_kepemilikan',

        'pengalaman_perusahaan_nama_paket_pekerjaan',
        'pengalaman_perusahaan_kelompok',
        'pengalaman_perusahaan_ringkasan_lingkup_pekerjaan',
        'pengalaman_perusahaan_lokasi',
        'pengalaman_perusahaan_pemberi_pekerjaan_nama',
        'pengalaman_perusahaan_pemberi_pekerjaan_alamat',
        'pengalaman_perusahaan_kontrak_tanggal',
        'pengalaman_perusahaan_kontrak_nilai',
        'pengalaman_perusahaan_status_penyedia_pekerjaan',
        'pengalaman_perusahaan_tanggal_berdasarkan_kontrak',
        'pengalaman_perusahaan_tanggal_berdasarkan_ba_serah_terima',

        'pekerjaan_yang_dilaksanakan_nama_paket_pekerjaan',
        'pekerjaan_yang_dilaksanakan_ringkasan_lingkup_pekerjaan',
        'pekerjaan_yang_dilaksanakan_lokasi',
        'pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_nama',
        'pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_alamat',
        'pekerjaan_yang_dilaksanakan_status_penyedia',
        'pekerjaan_yang_dilaksanakan_kontrak_tanggal',
        'pekerjaan_yang_dilaksanakan_kontrak_nilai',
        'pekerjaan_yang_dilaksanakan_progres_terakhir_kontrak',
        'pekerjaan_yang_dilaksanakan_progres_terakhir_prestasi_kerja',
        
        'skn_kekayaan_bersih',
        'skn_modal_kerja',
        'skn_kemampuan_nyata',
        'skn_sisa_kemampuan_nyata',
    ];

    public function perusahaans(){
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }
}
