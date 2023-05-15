@extends('templates.pages')
@section('title')
@section('header')
<h1>Detail Perusahaan</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Detail Perusahaan</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
                    <div class="separator">Data Administrasi</div>

                    <div class="form-group">
                      <label>Nama Badan Usaha/Perorangan</label>
                      <input disabled type="text" class="form-control" name="administrasi_nama_badan_usaha" value="{{ $kualifikasi->administrasi_nama_badan_usaha }}">
                    </div>
                    <div class="form-group">
                      <label class="d-block">Status Badan Usaha</label>
                      <div class="form-check form-check-inline">
                        <input disabled class="form-check-input" type="radio" name="administrasi_status_badan_usaha" value="pusat" {{ $kualifikasi->administrasi_status_badan_usaha == 'pusat' ? 'checked': '' }}>
                        <label class="form-check-label">Pusat</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input disabled class="form-check-input" type="radio" name="administrasi_status_badan_usaha" value="cabang" {{ $kualifikasi->administrasi_status_badan_usaha == 'cabang' ? 'checked': '' }}>
                        <label class="form-check-label">Cabang</label>
                      </div>
                    </div>
                    @if($kualifikasi->administrasi_status_badan_usaha == 'pusat')
                    <div class="form-group">
                      <label>Alamat Kantor Pusat</label>
                      <input disabled type="text" class="form-control" name="administrasi_alamat_kantor_pusat" value="{{ $kualifikasi->administrasi_alamat_kantor_pusat }}">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>No. Telepon</label>
                        <input disabled type="number" class="form-control" name="administrasi_no_telepon_pusat" value="{{ $kualifikasi->administrasi_no_telepon_pusat }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label>No. Fax</label>
                        <input disabled type="number" class="form-control" name="administrasi_no_fax_pusat" value="{{ $kualifikasi->administrasi_no_fax_pusat }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input disabled type="email" class="form-control" name="administrasi_email_pusat" value="{{ $kualifikasi->administrasi_email_pusat }}">
                    </div>
                    @endif
                    @if($kualifikasi->administrasi_status_badan_usaha == 'cabang')
                    <div class="form-group">
                      <label>Alamat Kantor Cabang</label>
                      <input disabled type="text" class="form-control" name="administrasi_alamat_kantor_cabang" value="{{ $kualifikasi->administrasi_alamat_kantor_cabang }}">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>No. Telepon</label>
                        <input disabled type="number" class="form-control" name="administrasi_no_telepon_cabang" value="{{ $kualifikasi->administrasi_no_telepon_cabang }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label>No. Fax</label>
                        <input disabled type="number" class="form-control" name="administrasi_no_fax_cabang" value="{{ $kualifikasi->administrasi_no_fax_cabang }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input disabled type="email" class="form-control" name="administrasi_email_cabang" value="{{ $kualifikasi->administrasi_email_cabang }}">
                    </div>
                    @endif
                    <div class="form-group">
                      <label>Bukti kepemilikan/penguasaan tempat usaha/kantor</label>
                      <p><a href="{{ asset('kualifikasi/bukti-kepemilikan-tempat-usaha/'.$kualifikasi['administrasi_bukti_kepemilikan_tempat_usaha']) }}" target="_blank">{{ $kualifikasi->administrasi_bukti_kepemilikan_tempat_usaha }}</a></p>
                    </div>
                    
                    <div class="separator">Landasan Hukum Pendirian Badan Usaha</div>

                    <p>1. Akta Pendirian Perusahaan/Anggaran Dasar Koperasi</p>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>a. Nomor</label>
                        <input disabled type="number" class="form-control" name="akta_pendirian_perusahaan_nomor" value="{{ $kualifikasi->akta_pendirian_perusahaan_nomor }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label>b. Tanggal</label>
                        <input disabled type="date" class="form-control" name="akta_pendirian_perusahaan_tanggal" value="{{ $kualifikasi->akta_pendirian_perusahaan_tanggal }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>c. Nama Notaris</label>
                      <input disabled type="text" class="form-control" name="akta_pendirian_perusahaan_nama_notaris" value="{{ $kualifikasi->akta_pendirian_perusahaan_nama_notaris }}">
                    </div>
                    <div class="form-group">
                      <label>d. Nomor Pengesahan/pendaftaran</label>
                      <input disabled type="number" class="form-control" name="akta_pendirian_perusahaan_nomor_pengesahan" value="{{ $kualifikasi->akta_pendirian_perusahaan_nomor_pengesahan }}">
                      <small class="form-text text-muted">[contoh: nomor pengesahan Kementerian Hukum dan HAM untuk yang berbentuk PT]</small>
                    </div>
                    <p>2. Perubahan Terakhir Akta Pendirian Perusahaan/Anggaran Dasar Koperasi</p>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>a. Nomor</label>
                        <input disabled type="number" class="form-control" name="perubahan_terakhir_akta_pendirian_perusahaan_nomor" value="{{ $kualifikasi->perubahan_terakhir_akta_pendirian_perusahaan_nomor }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label>b. Tanggal</label>
                        <input disabled type="date" class="form-control" name="perubahan_terakhir_akta_pendirian_perusahaan_tanggal" value="{{ $kualifikasi->perubahan_terakhir_akta_pendirian_perusahaan_tanggal }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>c. Nama Notaris</label>
                      <input disabled type="text" class="form-control" name="perubahan_terakhir_akta_pendirian_perusahaan_nama_notaris" value="{{ $kualifikasi->perubahan_terakhir_akta_pendirian_perusahaan_nama_notaris }}">
                      <small class="form-text text-muted">[contoh: persetujuan/bukti laporan dari Kementerian Hukum dan HAM untuk yang berbentuk PT]</small>
                    </div>

                    <div class="separator">Pengurus Badan Usaha</div>
                    
                    <p>a. Komisaris untuk Perseroan Terbatas (PT)</p>
                    <div class="form-group">
                      <label>Nama</label>
                      <input disabled type="text" class="form-control" name="komisaris_untuk_pt_nama" value="{{ $kualifikasi->komisaris_untuk_pt_nama }}">
                    </div>
                    <div class="form-group">
                      <label>nomor Kartu Tanda Penduduk (KTP)/ Paspor/Surat Keterangan Domisili Tinggal</label>
                      <input disabled type="text" class="form-control" name="komisaris_untuk_pt_ktp_paspor_keterangan_domisili_tinggal" value="{{ $kualifikasi->komisaris_untuk_pt_ktp_paspor_keterangan_domisili_tinggal }}">
                    </div>
                    <div class="form-group">
                      <label>Jabatan dalam Badan Usaha</label>
                      <input disabled type="text" class="form-control" name="komisaris_untuk_pt_jabatan_dalam_badan_usaha" value="{{ $kualifikasi->komisaris_untuk_pt_jabatan_dalam_badan_usaha }}">
                    </div>
                    <p>2. Direksi/Pengurus Badan Usaha</p>
                    <div class="form-group">
                      <label>Nama</label>
                      <input disabled type="text" class="form-control" name="direksi_pengurus_badan_usaha_nama" value="{{ $kualifikasi->direksi_pengurus_badan_usaha_nama }}">
                    </div>
                    <div class="form-group">
                      <label>nomor Kartu Tanda Penduduk (KTP)/ Paspor/Surat Keterangan Domisili Tinggal</label>
                      <input disabled type="text" class="form-control" name="direksi_pengurus_badan_usaha_ktp" value="{{ $kualifikasi->direksi_pengurus_badan_usaha_ktp }}">
                    </div>
                    <div class="form-group">
                      <label>Jabatan dalam Badan Usaha</label>
                      <input disabled type="text" class="form-control" name="direksi_pengurus_badan_usaha_jabatan_dalam_badan_usaha" value="{{ $kualifikasi->direksi_pengurus_badan_usaha_jabatan_dalam_badan_usaha }}">
                    </div>

                    <div class="separator">Izin Usaha dan Tanda Daftar Perusahaan (TDP)</div>

                    <div class="form-group">
                      <label>Surat Izin Usaha</label>
                      <p><a href="{{ asset('kualifikasi/surat-izin-usaha/'.$kualifikasi['tdp_surat_izin_usaha']) }}" target="_blank">{{ $kualifikasi->tdp_surat_izin_usaha }}</a></p>
                    </div>
                    <div class="form-group">
                      <label>Masa berlaku izin usaha</label>
                      <input disabled type="text" class="form-control" name="tdp_surat_masa_berlaku_izin_usaha" value="{{ $kualifikasi->tdp_surat_masa_berlaku_izin_usaha }}">
                    </div>
                    <div class="form-group">
                      <label>Instansi pemberi izin usaha</label>
                      <input disabled type="text" class="form-control" name="tdp_instansi_pemberi_izin_usaha" value="{{ $kualifikasi->tdp_instansi_pemberi_izin_usaha }}">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Kualifikasi Usaha</label>
                        <input disabled type="text" class="form-control" name="tdp_kualifikasi_usaha" value="{{ $kualifikasi->tdp_kualifikasi_usaha }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Klasifikasi Usaha</label>
                        <input disabled type="text" class="form-control" name="tdp_klasifikasi_usaha" value="{{ $kualifikasi->tdp_klasifikasi_usaha }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>No. TDP</label>
                      <input disabled type="text" class="form-control" name="tdp_no_tdp" value="{{ $kualifikasi->tdp_no_tdp }}">
                    </div>

                    <div class="separator">Izin Lainnya [apabila dipersyaratkan]</div>

                    <div class="form-group">
                      <label>Surat Izin</label>
                      <p><a href="{{ asset('kualifikasi/surat-izin-lainnya/'.$kualifikasi['izin_lainnya_surat_izin']) }}" target="_blank">{{ $kualifikasi->izin_lainnya_surat_izin }}</a></p>
                    </div>
                    <div class="form-group">
                      <label>Masa berlaku izin</label>
                      <input disabled type="text" class="form-control" name="izin_lainnya_masa_berlaku_izin" value="{{ $kualifikasi->izin_lainnya_masa_berlaku_izin }}">
                    </div>
                    <div class="form-group">
                      <label>Instansi pemberi izin</label>
                      <input disabled type="text" class="form-control" name="izin_lainnya_intansi_pemberi_izin" value="{{ $kualifikasi->izin_lainnya_intansi_pemberi_izin }}">
                    </div>

                    <div class="separator">Data Keuangan</div>

                    <p>a. Susunan Kepemilikan Saham (untuk PT)/Susunan Persero (untuk CV/Firma)</p>
                    <div class="form-group">
                      <label>Nama</label>
                      <input disabled type="text" class="form-control" name="susunan_kepemilikan_saham_nama" value="{{ $kualifikasi->susunan_kepemilikan_saham_nama }}">
                    </div>
                    <div class="form-group">
                      <label>nomor Kartu Tanda Penduduk (KTP)/Paspor/Surat Keterangan Domisili Tinggal</label>
                      <input disabled type="number" class="form-control" name="susunan_kepemilikan_saham_ktp" value="{{ $kualifikasi->susunan_kepemilikan_saham_ktp }}">
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input disabled type="text" class="form-control" name="susunan_kepemilikan_saham_alamat" value="{{ $kualifikasi->susunan_kepemilikan_saham_alamat }}">
                    </div>
                    <div class="form-group">
                      <label>Persentase</label>
                      <input disabled type="number" class="form-control" name="susunan_kepemilikan_saham_persentase" value="{{ $kualifikasi->susunan_kepemilikan_saham_persentase }}">
                    </div>

                    <p>2.	Pajak</p>
                    <div class="form-group">
                      <label>a. Nomor Pokok Wajib Pajak</label>
                      <input disabled type="number" class="form-control" name="pajak_nomor_pokok_wajib_pajak" value="{{ $kualifikasi->pajak_nomor_pokok_wajib_pajak }}">
                    </div>
                    <div class="form-group">
                      <label>b. Bukti laporan Pajak Tahun terakhir (SPT tahunan)</label>
                      <p><a href="{{ asset('kualifikasi/bukti-laporan-pajak-tahun-terakhir/'.$kualifikasi['pajak_bukti_laporan_pajak_tahun_terakhir']) }}" target="_blank">{{ $kualifikasi->pajak_bukti_laporan_pajak_tahun_terakhir }}</a></p>
                    </div>

                    <div class="separator">Data Personalia (Tenaga ahli/teknis/terampil badan usaha) [apabila diperlukan]</div>

                    <div class="form-group">
                      <label>Nama</label>
                      <input disabled type="text" class="form-control" name="data_personalia_nama" value="{{ $kualifikasi->data_personalia_nama }}">
                    </div>
                    <div class="form-group">
                      <label>Tgl/bln/thn lahir</label>
                      <input disabled type="date" class="form-control" name="data_personalia_tanggal_lahir" value="{{ $kualifikasi->data_personalia_tanggal_lahir }}">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Tingkat Pendidikan</label>
                        <input disabled type="text" class="form-control" name="data_personalia_tingkat_pendidikan" value="{{ $kualifikasi->data_personalia_tingkat_pendidikan }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Jabatan dalam pekerjaan</label>
                        <input disabled type="text" class="form-control" name="data_personalia_jabatan_dalam_pekerjaan" value="{{ $kualifikasi->data_personalia_jabatan_dalam_pekerjaan }}">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Pengalaman Kerja (tahun)</label>
                        <input disabled type="number" class="form-control" name="data_personalia_pengalaman_kerja" value="{{ $kualifikasi->data_personalia_pengalaman_kerja }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Profesi/keahlian</label>
                        <input disabled type="text" class="form-control" name="data_personalia_profesi_keahlian" value="{{ $kualifikasi->data_personalia_profesi_keahlian }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tahun Sertifikat/Ijazah</label>
                      <input disabled type="number" class="form-control" name="data_personalia_tahun_sertifikat_ijazah" value="{{ $kualifikasi->data_personalia_tahun_sertifikat_ijazah }}">
                    </div>

                    <div class="separator">Data Fasilitas/Peralatan/Perlengkapan [apabila diperlukan]</div>

                    <div class="form-group">
                      <label>Jenis Fasilitas/Peralatan/Perlengkapan</label>
                      <input disabled type="text" class="form-control" name="data_fasilitas_jenis_fasilitas" value="{{ $kualifikasi->data_fasilitas_jenis_fasilitas }}">
                    </div>
                    <div class="form-group">
                      <label>Jumlah</label>
                      <input disabled type="number" class="form-control" name="data_fasilitas_jumlah" value="{{ $kualifikasi->data_fasilitas_jumlah }}">
                    </div>
                    <div class="form-group">
                      <label>Kapasitas atau output pada saat ini</label>
                      <input disabled type="text" class="form-control" name="data_fasilitas_kapasitas_pada_saat_ini" value="{{ $kualifikasi->data_fasilitas_kapasitas_pada_saat_ini }}">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Merk dan tipe</label>
                        <input disabled type="text" class="form-control" name="data_fasilitas_merek_dan_tipe" value="{{ $kualifikasi->data_fasilitas_merek_dan_tipe }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Tahun pembuatan</label>
                        <input disabled type="number" class="form-control" name="data_fasilitas_tahun_pembuatan" value="{{ $kualifikasi->data_fasilitas_tahun_pembuatan }}">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Kondisi (%)</label>
                        <input disabled type="number" class="form-control" name="data_fasilitas_kondisi" value="{{ $kualifikasi->data_fasilitas_kondisi }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Lokasi Sekarang</label>
                        <input disabled type="text" class="form-control" name="data_fasilitas_lokasi_sekarang" value="{{ $kualifikasi->data_fasilitas_lokasi_sekarang }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Bukti Status Kepemilikan</label>
                      <p><a href="{{ asset('kualifikasi/bukti-status-kepemilikan/'.$kualifikasi['data_fasilitas_bukti_status_kepemilikan']) }}" target="_blank">{{ $kualifikasi->data_fasilitas_bukti_status_kepemilikan }}</a></p>
                    </div>

                    <div class="separator">Data Pengalaman Perusahaan dalam kurun waktu 3 tahun terakhir</div>

                    <div class="form-group">
                      <label>Nama Paket Pekerjaan</label>
                      <input disabled type="text" class="form-control" name="pengalaman_perusahaan_nama_paket_pekerjaan" value="{{ $kualifikasi->pengalaman_perusahaan_nama_paket_pekerjaan }}">
                    </div>
                    <div class="form-group">
                      <label>kelompok (grup)</label>
                      <input disabled type="text" class="form-control" name="pengalaman_perusahaan_kelompok" value="{{ $kualifikasi->pengalaman_perusahaan_kelompok }}">
                    </div>
                    <div class="form-group">
                      <label>Ringkasan Lingkup Pekerjaan</label>
                      <input disabled type="text" class="form-control" name="pengalaman_perusahaan_ringkasan_lingkup_pekerjaan" value="{{ $kualifikasi->pengalaman_perusahaan_ringkasan_lingkup_pekerjaan }}">
                    </div>
                    <div class="form-group">
                      <label>Lokasi</label>
                      <input disabled type="text" class="form-control" name="pengalaman_perusahaan_lokasi" value="{{ $kualifikasi->pengalaman_perusahaan_lokasi }}">
                    </div>
                    <p>Pemberi Pekerjaan</p>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>a. Nama</label>
                        <input disabled type="text" class="form-control" name="pengalaman_perusahaan_pemberi_pekerjaan_nama" value="{{ $kualifikasi->pengalaman_perusahaan_pemberi_pekerjaan_nama }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label>b. Alamat/Telepon</label>
                        <input disabled type="text" class="form-control" name="pengalaman_perusahaan_pemberi_pekerjaan_alamat" value="{{ $kualifikasi->pengalaman_perusahaan_pemberi_pekerjaan_alamat }}">
                      </div>
                    </div>
                    <p>Kontrak</p>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>a. Tanggal</label>
                        <input disabled type="date" class="form-control" name="pengalaman_perusahaan_kontrak_tanggal" value="{{ $kualifikasi->pengalaman_perusahaan_kontrak_tanggal }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label>b. Nilai</label>
                        <input disabled type="text" class="form-control" name="pengalaman_perusahaan_kontrak_nilai" value="{{ 'Rp. '.strrev(implode('.', str_split(strrev(strval($kualifikasi->pengalaman_perusahaan_kontrak_nilai)), 3))) }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Status Penyedia dalam pelaksanaan Pekerjaan</label>
                      <input disabled type="text" class="form-control" name="pengalaman_perusahaan_status_penyedia_pekerjaan" value="{{ $kualifikasi->pengalaman_perusahaan_status_penyedia_pekerjaan }}">
                    </div>
                    <p>Tanggal Selesai Pekerjaan Berdasarkan</p>
                    <div class="form-group">
                      <label>a. Kontrak</label>
                      <input disabled type="date" class="form-control" name="pengalaman_perusahaan_tanggal_berdasarkan_kontrak" value="{{ $kualifikasi->pengalaman_perusahaan_tanggal_berdasarkan_kontrak }}">
                    </div>
                    <div class="form-group">
                      <label>b. BA Serah Terima</label>
                      <input disabled type="date" class="form-control" name="pengalaman_perusahaan_tanggal_berdasarkan_ba_serah_terima" value="{{ $kualifikasi->pengalaman_perusahaan_tanggal_berdasarkan_ba_serah_terima }}">
                    </div>

                    <div class="separator">Data Pekerjaan yang sedang dilaksanakan</div>

                    <div class="form-group">
                      <label>Nama Paket Pekerjaan</label>
                      <input disabled type="text" class="form-control" name="pekerjaan_yang_dilaksanakan_nama_paket_pekerjaan" value="{{ $kualifikasi->pekerjaan_yang_dilaksanakan_nama_paket_pekerjaan }}">
                    </div>
                    <div class="form-group">
                      <label>Ringkasan Lingkup Pekerjaan</label>
                      <input disabled type="text" class="form-control" name="pekerjaan_yang_dilaksanakan_ringkasan_lingkup_pekerjaan" value="{{ $kualifikasi->pekerjaan_yang_dilaksanakan_ringkasan_lingkup_pekerjaan }}">
                    </div>
                    <div class="form-group">
                      <label>Lokasi</label>
                      <input disabled type="text" class="form-control" name="pekerjaan_yang_dilaksanakan_lokasi" value="{{ $kualifikasi->pekerjaan_yang_dilaksanakan_lokasi }}">
                    </div>
                    <p>Pemberi Pekerjaan</p>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>a. Nama</label>
                        <input disabled type="text" class="form-control" name="pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_nama" value="{{ $kualifikasi->pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_nama }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label>b. Alamat/Telepon</label>
                        <input disabled type="text" class="form-control" name="pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_alamat" value="{{ $kualifikasi->pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_alamat }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Status Penyedia dalam pelaksanaan Pekerjaan</label>
                      <input disabled type="text" class="form-control" name="pekerjaan_yang_dilaksanakan_status_penyedia" value="{{ $kualifikasi->pekerjaan_yang_dilaksanakan_status_penyedia }}">
                    </div>
                    <p>Kontrak</p>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>a. Tanggal</label>
                        <input disabled type="date" class="form-control" name="pekerjaan_yang_dilaksanakan_kontrak_tanggal" value="{{ $kualifikasi->pekerjaan_yang_dilaksanakan_kontrak_tanggal }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label>b. Nilai</label>
                        <input disabled type="text" class="form-control" name="pekerjaan_yang_dilaksanakan_kontrak_nilai" value="{{ 'Rp. '.strrev(implode('.', str_split(strrev(strval($kualifikasi->pekerjaan_yang_dilaksanakan_kontrak_nilai)), 3))) }}">
                      </div>
                    </div>
                    <p>Progres Terakhir</p>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>a. Kontrak (Rencana) (%)</label>
                        <input disabled type="number" class="form-control" name="pekerjaan_yang_dilaksanakan_progres_terakhir_kontrak" value="{{ $kualifikasi->pekerjaan_yang_dilaksanakan_progres_terakhir_kontrak }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label>b. Prestasi Kerja (%)</label>
                        <input disabled type="number" class="form-control" name="pekerjaan_yang_dilaksanakan_progres_terakhir_prestasi_kerja" value="{{ $kualifikasi->pekerjaan_yang_dilaksanakan_progres_terakhir_prestasi_kerja }}">
                      </div>
                    </div>

                    <div class="separator">Sisa Kemampuan Nyata (SKN)</div>

                    <div class="form-group">
                      <label>Kekayaan Bersih (KB)</label>
                      <input disabled type="text" class="form-control" name="skn_kekayaan_bersih" value="{{ 'Rp. '.strrev(implode('.', str_split(strrev(strval($kualifikasi->skn_kekayaan_bersih)), 3))) }}">
                    </div>
                    <div class="form-group">
                      <label>Modal Kerja (MK)</label>
                      <input disabled type="text" class="form-control" name="skn_modal_kerja" value="{{ 'Rp. '.strrev(implode('.', str_split(strrev(strval($kualifikasi->skn_modal_kerja)), 3))) }}">
                      <small class="form-text text-muted">fl . KB</small>
                    </div>
                    <div class="form-group">
                      <label>Kemampuan Nyata (KN)</label>
                      <input disabled type="text" class="form-control" name="skn_kemampuan_nyata" value="{{ 'Rp. '.strrev(implode('.', str_split(strrev(strval($kualifikasi->skn_kemampuan_nyata)), 3))) }}">
                      <small class="form-text text-muted">fl . MK</small>
                    </div>
                    <div class="form-group">
                      <label>Sisa Kemampuan Nyata (SKN)</label>
                      <input disabled type="text" class="form-control" name="skn_sisa_kemampuan_nyata" value="{{ 'Rp. '.strrev(implode('.', str_split(strrev(strval($kualifikasi->skn_sisa_kemampuan_nyata)), 3))) }}">
                      <small class="form-text text-muted">KN - Σ nilai paket pekerjaan yang sedang dilaksanakan</small>
                    </div>

                    <div class="separator">Additional Detail</div>
        <div>users.id :</div>
        <p>{{ $kualifikasi->perusahaans->users->id }}</p>
        <div>users.nama_panjang :</div>
        <p>{{ $kualifikasi->perusahaans->users->nama_panjang }}</p>
        <div>users.email :</div>
        <p>{{ $kualifikasi->perusahaans->users->email }}</p>
        <div>users.created_at :</div>
        <p>{{ $kualifikasi->perusahaans->users->created_at }}</p>
        <div>users.updated_at :</div>
        <p>{{ $kualifikasi->perusahaans->users->updated_at }}</p>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection