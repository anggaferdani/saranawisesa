<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Kualifikasi</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-social/bootstrap-social.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>
<style>
  .form-section{
      display: none;
  }
  .form-section.current{
      display: inline;
  }
  .parsley-errors-list{
      color:red;
  }
  /* #pusat{
    display: none;
  }
  #pusat:checked ~ #pusat{
    display: block;
  } */
  .separator {
    display: flex;
    align-items: center;
    text-align: center;
  }
  .separator::before,
  .separator::after {
    content: '';
    flex: 1;
    border-bottom: 1px solid #000;
  }
  .separator:not(:empty)::before {
    margin-right: .25em;
  }
  .separator:not(:empty)::after {
    margin-left: .25em;
  }
</style>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-4">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">Formulir Isian Data Kualifikasi</div>
              <div class="card-body">
            
                @if(Session::get('success'))
                  <div class="alert alert-important alert-success" role="alert">
                    {{ Session::get('success') }}
                  </div>
                @endif
            
                <form method="POST" action="{{ route('eproc.kirim-kualifikasi') }}" class="needs-validation form-lampiran" enctype="multipart/form-data" novalidate="#">
                  @csrf

                  <div class="form-section">
                    <div class="section-title mt-0">1/11 : Data Administrasi</div>
                    <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ $user_id }}" required>
                    <div class="form-group">
                      <label for="administrasi_nama_badan_usaha">Nama Badan Usaha/Perorangan</label>
                      <input id="administrasi_nama_badan_usaha" type="text" class="form-control" name="administrasi_nama_badan_usaha" required>
                    </div>
                    <div class="form-group">
                      <label class="d-block">Status Badan Usaha</label>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="pusat_radio_button" name="administrasi_status_badan_usaha" value="pusat" checked>
                        <label class="form-check-label" for="administrasi_status_badan_usaha">Pusat</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="cabang_radio_button" name="administrasi_status_badan_usaha" value="cabang">
                        <label class="form-check-label" for="administrasi_status_badan_usaha">Cabang</label>
                      </div>
                    </div>
                    <div id="pusat">
                      <div class="form-group">
                        <label for="administrasi_alamat_kantor_pusat">Alamat Kantor Pusat</label>
                        <input id="administrasi_alamat_kantor_pusat" type="text" class="form-control" name="administrasi_alamat_kantor_pusat">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="administrasi_no_telepon_pusat">No. Telepon</label>
                          <input id="administrasi_no_telepon_pusat" type="number" class="form-control" name="administrasi_no_telepon_pusat">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="administrasi_no_fax_pusat">No. Fax</label>
                          <input id="administrasi_no_fax_pusat" type="number" class="form-control" name="administrasi_no_fax_pusat">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="administrasi_email_pusat">Email</label>
                        <input id="administrasi_email_pusat" type="email" class="form-control" name="administrasi_email_pusat">
                      </div>
                    </div>
                    <div id="cabang">
                      <div class="form-group">
                        <label for="administrasi_alamat_kantor_cabang">Alamat Kantor Cabang</label>
                        <input id="administrasi_alamat_kantor_cabang" type="text" class="form-control" name="administrasi_alamat_kantor_cabang">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="administrasi_no_telepon_cabang">No. Telepon</label>
                          <input id="administrasi_no_telepon_cabang" type="number" class="form-control" name="administrasi_no_telepon_cabang">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="administrasi_no_fax_cabang">No. Fax</label>
                          <input id="administrasi_no_fax_cabang" type="number" class="form-control" name="administrasi_no_fax_cabang">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="administrasi_email_cabang">Email</label>
                        <input id="administrasi_email_cabang" type="email" class="form-control" name="administrasi_email_cabang">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="administrasi_bukti_kepemilikan_tempat_usaha">Bukti kepemilikan/penguasaan tempat usaha/kantor</label>
                      <input id="administrasi_bukti_kepemilikan_tempat_usaha" type="file" class="form-control-file" name="administrasi_bukti_kepemilikan_tempat_usaha" required>
                    </div>
                  </div>

                  <div class="form-section">
                    <div class="section-title mt-0">2/11 : Landasan Hukum Pendirian Badan Usaha</div>
                    <p>1. Akta Pendirian Perusahaan/Anggaran Dasar Koperasi</p>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="akta_pendirian_perusahaan_nomor">Nomor</label>
                        <input id="akta_pendirian_perusahaan_nomor" type="number" class="form-control" name="akta_pendirian_perusahaan_nomor" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="akta_pendirian_perusahaan_tanggal">Tanggal</label>
                        <input id="akta_pendirian_perusahaan_tanggal" type="date" class="form-control" name="akta_pendirian_perusahaan_tanggal" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="akta_pendirian_perusahaan_nama_notaris">Nama Notaris</label>
                      <input id="akta_pendirian_perusahaan_nama_notaris" type="text" class="form-control" name="akta_pendirian_perusahaan_nama_notaris" required>
                    </div>
                    <div class="form-group">
                      <label for="akta_pendirian_perusahaan_nomor_pengesahan">Nomor Pengesahan/pendaftaran</label>
                      <input id="akta_pendirian_perusahaan_nomor_pengesahan" type="number" class="form-control" name="akta_pendirian_perusahaan_nomor_pengesahan" required>
                      <small class="form-text text-muted">[contoh: nomor pengesahan Kementerian Hukum dan HAM untuk yang berbentuk PT]</small>
                    </div>
                    <p>2. Perubahan Terakhir Akta Pendirian Perusahaan/Anggaran Dasar Koperasi</p>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="perubahan_terakhir_akta_pendirian_perusahaan_nomor">Nomor</label>
                        <input id="perubahan_terakhir_akta_pendirian_perusahaan_nomor" type="number" class="form-control" name="perubahan_terakhir_akta_pendirian_perusahaan_nomor" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="perubahan_terakhir_akta_pendirian_perusahaan_tanggal">Tanggal</label>
                        <input id="perubahan_terakhir_akta_pendirian_perusahaan_tanggal" type="date" class="form-control" name="perubahan_terakhir_akta_pendirian_perusahaan_tanggal" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="perubahan_terakhir_akta_pendirian_perusahaan_nama_notaris">Nama Notaris</label>
                      <input id="perubahan_terakhir_akta_pendirian_perusahaan_nama_notaris" type="text" class="form-control" name="perubahan_terakhir_akta_pendirian_perusahaan_nama_notaris" required>
                      <small class="form-text text-muted">[contoh: persetujuan/bukti laporan dari Kementerian Hukum dan HAM untuk yang berbentuk PT]</small>
                    </div>
                  </div>
                  
                  <div class="form-section">
                    <div class="section-title mt-0">3/11 : Pengurus Badan Usaha</div>
                    <p>1. Komisaris untuk Perseroan Terbatas (PT)</p>
                    <div class="form-group">
                      <label for="komisaris_untuk_pt_nama">Nama</label>
                      <input id="komisaris_untuk_pt_nama" type="text" class="form-control" name="komisaris_untuk_pt_nama" required>
                    </div>
                    <div class="form-group">
                      <label for="komisaris_untuk_pt_ktp_paspor_keterangan_domisili_tinggal">nomor Kartu Tanda Penduduk (KTP)/ Paspor/Surat Keterangan Domisili Tinggal</label>
                      <input id="komisaris_untuk_pt_ktp_paspor_keterangan_domisili_tinggal" type="text" class="form-control" name="komisaris_untuk_pt_ktp_paspor_keterangan_domisili_tinggal" required>
                    </div>
                    <div class="form-group">
                      <label for="komisaris_untuk_pt_jabatan_dalam_badan_usaha">Jabatan dalam Badan Usaha</label>
                      <input id="komisaris_untuk_pt_jabatan_dalam_badan_usaha" type="text" class="form-control" name="komisaris_untuk_pt_jabatan_dalam_badan_usaha" required>
                    </div>
                    <p>2. Direksi/Pengurus Badan Usaha</p>
                    <div class="form-group">
                      <label for="direksi_pengurus_badan_usaha_nama">Nama</label>
                      <input id="direksi_pengurus_badan_usaha_nama" type="text" class="form-control" name="direksi_pengurus_badan_usaha_nama" required>
                    </div>
                    <div class="form-group">
                      <label for="direksi_pengurus_badan_usaha_ktp">nomor Kartu Tanda Penduduk (KTP)/ Paspor/Surat Keterangan Domisili Tinggal</label>
                      <input id="direksi_pengurus_badan_usaha_ktp" type="text" class="form-control" name="direksi_pengurus_badan_usaha_ktp" required>
                    </div>
                    <div class="form-group">
                      <label for="direksi_pengurus_badan_usaha_jabatan_dalam_badan_usaha">Jabatan dalam Badan Usaha</label>
                      <input id="direksi_pengurus_badan_usaha_jabatan_dalam_badan_usaha" type="text" class="form-control" name="direksi_pengurus_badan_usaha_jabatan_dalam_badan_usaha" required>
                    </div>
                  </div>

                  <div class="form-section">
                    <div class="section-title mt-0">4/11 : Izin Usaha dan Tanda Daftar Perusahaan (TDP)</div>
                    <p>1. Akta Pendirian Perusahaan/Anggaran Dasar Koperasi</p>
                    <div class="form-group">
                      <label for="tdp_surat_izin_usaha">Surat Izin Usaha</label>
                      <input id="tdp_surat_izin_usaha" type="file" class="form-control-file" name="tdp_surat_izin_usaha" required>
                    </div>
                    <div class="form-group">
                      <label for="tdp_surat_masa_berlaku_izin_usaha">Masa berlaku izin usaha</label>
                      <input id="tdp_surat_masa_berlaku_izin_usaha" type="text" class="form-control" name="tdp_surat_masa_berlaku_izin_usaha" required>
                    </div>
                    <div class="form-group">
                      <label for="tdp_instansi_pemberi_izin_usaha">Instansi pemberi izin usaha</label>
                      <input id="tdp_instansi_pemberi_izin_usaha" type="text" class="form-control" name="tdp_instansi_pemberi_izin_usaha" required>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="tdp_kualifikasi_usaha">Kualifikasi Usaha</label>
                        <input id="tdp_kualifikasi_usaha" type="text" class="form-control" name="tdp_kualifikasi_usaha" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="tdp_klasifikasi_usaha">Klasifikasi Usaha</label>
                        <input id="tdp_klasifikasi_usaha" type="text" class="form-control" name="tdp_klasifikasi_usaha" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tdp_no_tdp">No. TDP</label>
                      <input id="tdp_no_tdp" type="text" class="form-control" name="tdp_no_tdp" required>
                    </div>
                    <p>2. Izin Lainnya [apabila dipersyaratkan]</p>
                    <div class="form-group">
                      <label for="izin_lainnya_surat_izin">Surat Izin</label>
                      <input id="izin_lainnya_surat_izin" type="file" class="form-control-file" name="izin_lainnya_surat_izin">
                    </div>
                    <div class="form-group">
                      <label for="izin_lainnya_masa_berlaku_izin">Masa berlaku izin</label>
                      <input id="izin_lainnya_masa_berlaku_izin" type="text" class="form-control" name="izin_lainnya_masa_berlaku_izin">
                    </div>
                    <div class="form-group">
                      <label for="izin_lainnya_intansi_pemberi_izin">Instansi pemberi izin</label>
                      <input id="izin_lainnya_intansi_pemberi_izin" type="text" class="form-control" name="izin_lainnya_intansi_pemberi_izin">
                    </div>
                  </div>

                  <div class="form-section">
                    <div class="section-title mt-0">5/11 : Data Keuangan</div>
                    <p>1. Susunan Kepemilikan Saham (untuk PT)/Susunan Persero (untuk CV/Firma)</p>
                    <div class="form-group">
                      <label for="susunan_kepemilikan_saham_nama">Nama</label>
                      <input id="susunan_kepemilikan_saham_nama" type="text" class="form-control" name="susunan_kepemilikan_saham_nama" required>
                    </div>
                    <div class="form-group">
                      <label for="susunan_kepemilikan_saham_ktp">nomor Kartu Tanda Penduduk (KTP)/Paspor/Surat Keterangan Domisili Tinggal</label>
                      <input id="susunan_kepemilikan_saham_ktp" type="number" class="form-control" name="susunan_kepemilikan_saham_ktp" required>
                    </div>
                    <div class="form-group">
                      <label for="susunan_kepemilikan_saham_alamat">Alamat</label>
                      <input id="susunan_kepemilikan_saham_alamat" type="text" class="form-control" name="susunan_kepemilikan_saham_alamat" required>
                    </div>
                    <div class="form-group">
                      <label for="susunan_kepemilikan_saham_persentase">Persentase</label>
                      <input id="susunan_kepemilikan_saham_persentase" type="number" class="form-control" name="susunan_kepemilikan_saham_persentase" required>
                    </div>
                    <p>2.	Pajak</p>
                    <div class="form-group">
                      <label for="pajak_nomor_pokok_wajib_pajak">Nomor Pokok Wajib Pajak</label>
                      <input id="pajak_nomor_pokok_wajib_pajak" type="number" class="form-control" name="pajak_nomor_pokok_wajib_pajak" required>
                    </div>
                    <div class="form-group">
                      <label for="pajak_bukti_laporan_pajak_tahun_terakhir">Bukti laporan Pajak Tahun terakhir (SPT tahunan)</label>
                      <input id="pajak_bukti_laporan_pajak_tahun_terakhir" type="file" class="form-control-file" name="pajak_bukti_laporan_pajak_tahun_terakhir" required>
                    </div>
                  </div>

                  <div class="form-section">
                    <div class="section-title mt-0">6/11 : Data Personalia (Tenaga ahli/teknis/terampil badan usaha) [apabila diperlukan]</div>
                    <div class="form-group">
                      <label for="data_personalia_nama">Nama</label>
                      <input id="data_personalia_nama" type="text" class="form-control" name="data_personalia_nama">
                    </div>
                    <div class="form-group">
                      <label for="data_personalia_tanggal_lahir">Tgl/bln/thn lahir</label>
                      <input id="data_personalia_tanggal_lahir" type="date" class="form-control" name="data_personalia_tanggal_lahir">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="data_personalia_tingkat_pendidikan">Tingkat Pendidikan</label>
                        <input id="data_personalia_tingkat_pendidikan" type="text" class="form-control" name="data_personalia_tingkat_pendidikan">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="data_personalia_jabatan_dalam_pekerjaan">Jabatan dalam pekerjaan</label>
                        <input id="data_personalia_jabatan_dalam_pekerjaan" type="text" class="form-control" name="data_personalia_jabatan_dalam_pekerjaan">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="data_personalia_pengalaman_kerja">Pengalaman Kerja (tahun)</label>
                        <input id="data_personalia_pengalaman_kerja" type="number" class="form-control" name="data_personalia_pengalaman_kerja">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="data_personalia_profesi_keahlian">Profesi/keahlian</label>
                        <input id="data_personalia_profesi_keahlian" type="text" class="form-control" name="data_personalia_profesi_keahlian">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="data_personalia_tahun_sertifikat_ijazah">Tahun Sertifikat/Ijazah</label>
                      <input id="data_personalia_tahun_sertifikat_ijazah" type="number" class="form-control" name="data_personalia_tahun_sertifikat_ijazah">
                    </div>
                  </div>

                  <div class="form-section">
                    <div class="section-title mt-0">7/11 : Data Fasilitas/Peralatan/Perlengkapan [apabila diperlukan]</div>
                    <div class="form-group">
                      <label for="data_fasilitas_jenis_fasilitas">Jenis Fasilitas/Peralatan/Perlengkapan</label>
                      <input id="data_fasilitas_jenis_fasilitas" type="text" class="form-control" name="data_fasilitas_jenis_fasilitas">
                    </div>
                    <div class="form-group">
                      <label for="data_fasilitas_jumlah">Jumlah</label>
                      <input id="data_fasilitas_jumlah" type="number" class="form-control" name="data_fasilitas_jumlah">
                    </div>
                    <div class="form-group">
                      <label for="data_fasilitas_kapasitas_pada_saat_ini">Kapasitas atau output pada saat ini</label>
                      <input id="data_fasilitas_kapasitas_pada_saat_ini" type="text" class="form-control" name="data_fasilitas_kapasitas_pada_saat_ini">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="data_fasilitas_merek_dan_tipe">Merk dan tipe</label>
                        <input id="data_fasilitas_merek_dan_tipe" type="text" class="form-control" name="data_fasilitas_merek_dan_tipe">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="data_fasilitas_tahun_pembuatan">Tahun pembuatan</label>
                        <input id="data_fasilitas_tahun_pembuatan" type="number" class="form-control" name="data_fasilitas_tahun_pembuatan">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="data_fasilitas_kondisi">Kondisi (%)</label>
                        <input id="data_fasilitas_kondisi" type="number" class="form-control" name="data_fasilitas_kondisi">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="data_fasilitas_lokasi_sekarang">Lokasi Sekarang</label>
                        <input id="data_fasilitas_lokasi_sekarang" type="text" class="form-control" name="data_fasilitas_lokasi_sekarang">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="data_fasilitas_bukti_status_kepemilikan">Bukti Status Kepemilikan</label>
                      <input id="data_fasilitas_bukti_status_kepemilikan" type="file" class="form-control-file" name="data_fasilitas_bukti_status_kepemilikan">
                    </div>
                  </div>

                  <div class="form-section">
                    <div class="section-title mt-0">8/11 : Data Pengalaman Perusahaan dalam kurun waktu 3 tahun terakhir</div>
                    <div class="form-group">
                      <label for="pengalaman_perusahaan_nama_paket_pekerjaan">Nama Paket Pekerjaan</label>
                      <input id="pengalaman_perusahaan_nama_paket_pekerjaan" type="text" class="form-control" name="pengalaman_perusahaan_nama_paket_pekerjaan" required>
                    </div>
                    <div class="form-group">
                      <label for="pengalaman_perusahaan_kelompok">kelompok (grup)</label>
                      <input id="pengalaman_perusahaan_kelompok" type="text" class="form-control" name="pengalaman_perusahaan_kelompok" required>
                    </div>
                    <div class="form-group">
                      <label for="pengalaman_perusahaan_ringkasan_lingkup_pekerjaan">Ringkasan Lingkup Pekerjaan</label>
                      <input id="pengalaman_perusahaan_ringkasan_lingkup_pekerjaan" type="text" class="form-control" name="pengalaman_perusahaan_ringkasan_lingkup_pekerjaan" required>
                    </div>
                    <div class="form-group">
                      <label for="pengalaman_perusahaan_lokasi">Lokasi</label>
                      <input id="pengalaman_perusahaan_lokasi" type="text" class="form-control" name="pengalaman_perusahaan_lokasi" required>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="pengalaman_perusahaan_pemberi_pekerjaan_nama">Pemberi Pekerjaan : Nama</label>
                        <input id="pengalaman_perusahaan_pemberi_pekerjaan_nama" type="text" class="form-control" name="pengalaman_perusahaan_pemberi_pekerjaan_nama" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="pengalaman_perusahaan_pemberi_pekerjaan_alamat">Pemberi Pekerjaan : Alamat/Telepon</label>
                        <input id="pengalaman_perusahaan_pemberi_pekerjaan_alamat" type="text" class="form-control" name="pengalaman_perusahaan_pemberi_pekerjaan_alamat" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="pengalaman_perusahaan_kontrak_tanggal">Kontrak : Tanggal</label>
                        <input id="pengalaman_perusahaan_kontrak_tanggal" type="date" class="form-control" name="pengalaman_perusahaan_kontrak_tanggal" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="pengalaman_perusahaan_kontrak_nilai">Kontrak : Nilai</label>
                        <input id="pengalaman_perusahaan_kontrak_nilai" type="text" class="form-control" name="pengalaman_perusahaan_kontrak_nilai" onkeyup="formatNumber(this)" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="pengalaman_perusahaan_status_penyedia_pekerjaan">Status Penyedia dalam pelaksanaan Pekerjaan</label>
                      <input id="pengalaman_perusahaan_status_penyedia_pekerjaan" type="text" class="form-control" name="pengalaman_perusahaan_status_penyedia_pekerjaan" required>
                    </div>
                    <div class="form-group">
                      <label for="pengalaman_perusahaan_tanggal_berdasarkan_kontrak">Tanggal Selesai Pekerjaan Berdasarkan : Kontrak</label>
                      <input id="pengalaman_perusahaan_tanggal_berdasarkan_kontrak" type="date" class="form-control" name="pengalaman_perusahaan_tanggal_berdasarkan_kontrak" required>
                    </div>
                    <div class="form-group">
                      <label for="pengalaman_perusahaan_tanggal_berdasarkan_ba_serah_terima">Tanggal Selesai Pekerjaan Berdasarkan : BA Serah Terima</label>
                      <input id="pengalaman_perusahaan_tanggal_berdasarkan_ba_serah_terima" type="date" class="form-control" name="pengalaman_perusahaan_tanggal_berdasarkan_ba_serah_terima" required>
                    </div>
                  </div>

                  <div class="form-section">
                    <div class="section-title mt-0">9/11 : Data Pekerjaan yang sedang dilaksanakan</div>
                    <div class="form-group">
                      <label for="pekerjaan_yang_dilaksanakan_nama_paket_pekerjaan">Nama Paket Pekerjaan</label>
                      <input id="pekerjaan_yang_dilaksanakan_nama_paket_pekerjaan" type="text" class="form-control" name="pekerjaan_yang_dilaksanakan_nama_paket_pekerjaan" required>
                    </div>
                    <div class="form-group">
                      <label for="pekerjaan_yang_dilaksanakan_ringkasan_lingkup_pekerjaan">Ringkasan Lingkup Pekerjaan</label>
                      <input id="pekerjaan_yang_dilaksanakan_ringkasan_lingkup_pekerjaan" type="text" class="form-control" name="pekerjaan_yang_dilaksanakan_ringkasan_lingkup_pekerjaan" required>
                    </div>
                    <div class="form-group">
                      <label for="pekerjaan_yang_dilaksanakan_lokasi">Lokasi</label>
                      <input id="pekerjaan_yang_dilaksanakan_lokasi" type="text" class="form-control" name="pekerjaan_yang_dilaksanakan_lokasi" required>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_nama">Pemberi Pekerjaan : Nama</label>
                        <input id="pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_nama" type="text" class="form-control" name="pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_nama" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_alamat">Pemberi Pekerjaan : Alamat/Telepon</label>
                        <input id="pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_alamat" type="text" class="form-control" name="pekerjaan_yang_dilaksanakan_pemberi_pekerjaan_alamat" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="pekerjaan_yang_dilaksanakan_status_penyedia">Status Penyedia dalam pelaksanaan Pekerjaan</label>
                      <input id="pekerjaan_yang_dilaksanakan_status_penyedia" type="text" class="form-control" name="pekerjaan_yang_dilaksanakan_status_penyedia" required>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="pekerjaan_yang_dilaksanakan_kontrak_tanggal">Kontrak : Tanggal</label>
                        <input id="pekerjaan_yang_dilaksanakan_kontrak_tanggal" type="date" class="form-control" name="pekerjaan_yang_dilaksanakan_kontrak_tanggal" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="pekerjaan_yang_dilaksanakan_kontrak_nilai">Kontrak : Nilai</label>
                        <input id="pekerjaan_yang_dilaksanakan_kontrak_nilai" type="text" class="form-control" name="pekerjaan_yang_dilaksanakan_kontrak_nilai" onkeyup="formatNumber(this)" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="pekerjaan_yang_dilaksanakan_progres_terakhir_kontrak">Progres Terakhir : Kontrak (Rencana) (%)</label>
                        <input id="pekerjaan_yang_dilaksanakan_progres_terakhir_kontrak" type="number" class="form-control" name="pekerjaan_yang_dilaksanakan_progres_terakhir_kontrak" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="pekerjaan_yang_dilaksanakan_progres_terakhir_prestasi_kerja">Progres Terakhir : Prestasi Kerja (%)</label>
                        <input id="pekerjaan_yang_dilaksanakan_progres_terakhir_prestasi_kerja" type="number" class="form-control" name="pekerjaan_yang_dilaksanakan_progres_terakhir_prestasi_kerja" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-section">
                    <div class="section-title mt-0">10/11 : Sisa Kemampuan Nyata (SKN)</div>
                    <div class="form-group">
                      <label for="skn_kekayaan_bersih">Kekayaan Bersih (KB)</label>
                      <input id="skn_kekayaan_bersih" type="text" class="form-control" name="skn_kekayaan_bersih" onkeyup="formatNumber(this)" required>
                    </div>
                    <div class="form-group">
                      <label for="skn_modal_kerja">Modal Kerja (MK)</label>
                      <input id="skn_modal_kerja" type="text" class="form-control" name="skn_modal_kerja" onkeyup="formatNumber(this)" required>
                      <small class="form-text text-muted">fl . KB</small>
                    </div>
                    <div class="form-group">
                      <label for="skn_kemampuan_nyata">Kemampuan Nyata (KN)</label>
                      <input id="skn_kemampuan_nyata" type="text" class="form-control" name="skn_kemampuan_nyata" onkeyup="formatNumber(this)" required>
                      <small class="form-text text-muted">fl . MK</small>
                    </div>
                    <div class="form-group">
                      <label for="skn_sisa_kemampuan_nyata">Sisa Kemampuan Nyata (SKN)</label>
                      <input id="skn_sisa_kemampuan_nyata" type="text" class="form-control" name="skn_sisa_kemampuan_nyata" onkeyup="formatNumber(this)" required>
                      <small class="form-text text-muted">KN - Σ nilai paket pekerjaan yang sedang dilaksanakan</small>
                    </div>
                  </div>

                  <div class="form-section">
                    <div class="section-title mt-0">11/11 : Persetujuan</div>
                    <p>Demikian Formulir Isian Kualifikasi ini saya buat dengan sebenarnya dan penuh rasa tanggung jawab. Jika dikemudian hari ditemui bahwa data/dokumen yang saya sampaikan tidak benar dan ada pemalsuan, maka saya dan badan usaha yang saya wakili bersedia dikenakan sanksi administratif, dikenakan sanksi Daftar Hitam, digugat secara perdata dan/atau dilaporkan secara pidana sesuai dengan peraturan perundang-undangan.</p>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms_and_conditions" class="custom-control-input" id="terms_and_conditions" required>
                      <label class="custom-control-label" for="terms_and_conditions">I agree with the terms and conditions</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group form-navigation">
                    <button type="button" class="previous btn btn-secondary">Previous</button>
                    <button type="button" class="next btn btn-primary">Next</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>
    function formatNumber(input){
      var num = input.value.replace(/[^0-9]/g, '');

      var formattedNum = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(num);
      input.value = formattedNum;
    }

    $(function(){
      $('#cabang').hide();

      $("#administrasi_alamat_kantor_pusat").attr('required', true);
      $("#administrasi_no_telepon_pusat").attr('required', true);
      $("#administrasi_no_fax_pusat").attr('required', true);
      $("#administrasi_email_pusat").attr('required', true);
      $("input[name=administrasi_status_badan_usaha]:radio").click(function(){
        if ($('input[name=administrasi_status_badan_usaha]:checked').val() == "pusat") {
          $('#pusat').show();
          $('#cabang').hide();

          $("#administrasi_alamat_kantor_pusat").attr('required', true);
          $("#administrasi_no_telepon_pusat").attr('required', true);
          $("#administrasi_no_fax_pusat").attr('required', true);
          $("#administrasi_email_pusat").attr('required', true);

          $("#administrasi_alamat_kantor_cabang").attr('required', false);
          $("#administrasi_no_telepon_cabang").attr('required', false);
          $("#administrasi_no_fax_cabang").attr('required', false);
          $("#administrasi_email_cabang").attr('required', false);
        } else if ($('input[name=administrasi_status_badan_usaha]:checked').val() == "cabang") {
          $('#pusat').hide();
          $('#cabang').show();

          $("#administrasi_alamat_kantor_pusat").attr('required', false);
          $("#administrasi_no_telepon_pusat").attr('required', false);
          $("#administrasi_no_fax_pusat").attr('required', false);
          $("#administrasi_email_pusat").attr('required', false);

          $("#administrasi_alamat_kantor_cabang").attr('required', true);
          $("#administrasi_no_telepon_cabang").attr('required', true);
          $("#administrasi_no_fax_cabang").attr('required', true);
          $("#administrasi_email_cabang").attr('required', true);
        }
      });
    });

    $(function(){
        var $sections=$('.form-section');

        function navigateTo(index){

            $sections.removeClass('current').eq(index).addClass('current');

            $('.form-navigation .previous').toggle(index>0);
            var atTheEnd = index >= $sections.length - 1;
            $('.form-navigation .next').toggle(!atTheEnd);
            $('.form-navigation [Type=submit]').toggle(atTheEnd);
     
            const step= document.querySelector('.step'+index);
            step.style.backgroundColor="#17a2b8";
            step.style.color="white";
        }

        function curIndex(){
            return $sections.index($sections.filter('.current'));
        }

        $('.form-navigation .previous').click(function(){
            navigateTo(curIndex() - 1);
        });

        $('.form-navigation .next').click(function(){
            $('.form-lampiran').parsley().whenValidate({
                group:'block-'+curIndex()
            }).done(function(){
                navigateTo(curIndex()+1);
            });
        });

        $sections.each(function(index,section){
            $(section).find(':input').attr('data-parsley-group','block-'+index);
        });

        navigateTo(0);
    });
</script>

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/modules/popper.js') }}"></script>
  <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>