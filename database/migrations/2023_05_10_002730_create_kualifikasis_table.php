<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kualifikasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perusahaan_id')->references('id')->on('perusahaans')->onDelete('cascade');

            $table->string('administrasi_nama_badan_usaha');
            $table->enum('administrasi_status_badan_usaha', ['pusat', 'cabang']);
            $table->string('administrasi_alamat_kantor_pusat')->nullable();
            $table->string('administrasi_no_telepon_pusat')->nullable();
            $table->string('administrasi_no_fax_pusat')->nullable();
            $table->string('administrasi_email_pusat')->nullable();
            $table->string('administrasi_alamat_kantor_cabang')->nullable();
            $table->string('administrasi_no_telepon_cabang')->nullable();
            $table->string('administrasi_no_fax_cabang')->nullable();
            $table->string('administrasi_email_cabang')->nullable();
            $table->string('administrasi_bukti_kepemilikan_tempat_usaha');

            $table->string('akta_pendirian_perusahaan_nomor');
            $table->date('akta_pendirian_perusahaan_tanggal');
            $table->string('akta_pendirian_perusahaan_nama_notaris');
            $table->string('akta_pendirian_perusahaan_nomor_pengesahan');
            $table->string('perubahan_terakhir_akta_pendirian_perusahaan_nomor');
            $table->date('perubahan_terakhir_akta_pendirian_perusahaan_tanggal');
            $table->string('perubahan_terakhir_akta_pendirian_perusahaan_nama_notaris');

            $table->text('komisaris_untuk_pt_nama');
            $table->text('komisaris_untuk_pt_ktp_paspor_keterangan_domisili_tinggal');
            $table->text('komisaris_untuk_pt_jabatan_dalam_badan_usaha');
            $table->text('direksi_pengurus_badan_usaha_nama');
            $table->text('direksi_pengurus_badan_usaha_ktp');
            $table->text('direksi_pengurus_badan_usaha_jabatan_dalam_badan_usaha');

            $table->string('tdp_surat_izin_usaha');
            $table->string('tdp_surat_masa_berlaku_izin_usaha');
            $table->string('tdp_instansi_pemberi_izin_usaha');
            $table->string('tdp_kualifikasi_usaha');
            $table->string('tdp_klasifikasi_usaha');
            $table->string('tdp_no_tdp');

            $table->string('izin_lainnya_surat_izin')->nullable();
            $table->text('izin_lainnya_masa_berlaku_izin')->nullable();
            $table->text('izin_lainnya_intansi_pemberi_izin')->nullable();

            $table->string('susunan_kepemilikan_saham_nama');
            $table->string('susunan_kepemilikan_saham_ktp');
            $table->string('susunan_kepemilikan_saham_alamat');
            $table->string('susunan_kepemilikan_saham_persentase');

            $table->string('pajak_nomor_pokok_wajib_pajak');
            $table->string('pajak_bukti_laporan_pajak_tahun_terakhir');

            $table->text('data_personalia_nama')->nullable();
            $table->date('data_personalia_tanggal_lahir')->nullable();
            $table->text('data_personalia_tingkat_pendidikan')->nullable();
            $table->text('data_personalia_jabatan_dalam_pekerjaan')->nullable();
            $table->text('data_personalia_pengalaman_kerja')->nullable();
            $table->text('data_personalia_profesi_keahlian')->nullable();
            $table->text('data_personalia_tahun_sertifikat_ijazah')->nullable();

            $table->text('data_fasilitas_jenis_fasilitas')->nullable();
            $table->text('data_fasilitas_jumlah')->nullable();
            $table->text('data_fasilitas_kapasitas_pada_saat_ini')->nullable();
            $table->text('data_fasilitas_merek_dan_tipe')->nullable();
            $table->text('data_fasilitas_tahun_pembuatan')->nullable();
            $table->text('data_fasilitas_kondisi')->nullable();
            $table->text('data_fasilitas_lokasi_sekarang')->nullable();
            $table->string('data_fasilitas_bukti_status_kepemilikan')->nullable();

            $table->string('pengalaman_perusahaan_nama_paket_pekerjaan');
            $table->string('pengalaman_perusahaan_kelompok');
            $table->string('pengalaman_perusahaan_ringkasan_lingkup_pekerjaan');
            $table->string('pengalaman_perusahaan_lokasi');
            $table->string('pengalaman_perusahaan_pemberi_pekerjaan_nama');
            $table->string('pengalaman_perusahaan_pemberi_pekerjaan_alamat');
            $table->date('pengalaman_perusahaan_kontrak_tanggal');
            $table->string('pengalaman_perusahaan_kontrak_nilai');
            $table->string('pengalaman_perusahaan_status_penyedia_pekerjaan');
            $table->date('pengalaman_perusahaan_tanggal_berdasarkan_kontrak');
            $table->date('pengalaman_perusahaan_tanggal_berdasarkan_ba_serah_terima');
            
            $table->string('pekerjaan_yang_dilaksanakan_nama_paket_pekerjaan');
            $table->string('pekerjaan_yang_dilaksanakan_ringkasan_lingkup_pekerjaan');
            $table->string('pekerjaan_yang_dilaksanakan_lokasi');
            $table->string('pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_nama');
            $table->string('pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_alamat');
            $table->string('pekerjaan_yang_dilaksanakan_status_penyedia');
            $table->date('pekerjaan_yang_dilaksanakan_kontrak_tanggal');
            $table->string('pekerjaan_yang_dilaksanakan_kontrak_nilai');
            $table->string('pekerjaan_yang_dilaksanakan_progres_terakhir_kontrak');
            $table->string('pekerjaan_yang_dilaksanakan_progres_terakhir_prestasi_kerja');

            $table->string('skn_kekayaan_bersih');
            $table->string('skn_modal_kerja');
            $table->string('skn_kemampuan_nyata');
            $table->string('skn_sisa_kemampuan_nyata');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kualifikasis');
    }
};
