<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>{{ $title }}</title>
</head>
<body>
  <p>{{ $user->nama_panjang }}</p>
  <p>{{ $date }}</p>
  <h1>{{ $title }}</h1>
  <p>debitis aspernatur ad. Accusamus velit odio minima in aliquid voluptates. Saepe autem perferendis nulla vero distinctio ad omnis laboriosam beatae molestias maiores, in cum molestiae repellendus nostrum cumque quia magni eos.</p>

  <h5>Administrasi</h5>
  <table class="table table-bordered">
    <tbody>
      <tr><td style="width: 30%">Nama Badan Usaha</td><td>{{ $administrasi->nama_badan_usaha }}</td></tr>
      <tr>
        <td style="width: 30%">Status Badan Usaha</td>
        <td>
          @if($administrasi->status_badan_usaha == 'pusat')
            Pusat
          @endif
          @if($administrasi->status_badan_usaha == 'cabang')
            Cabang
          @endif
        </td>
      </tr>
      <tr><td style="width: 30%">Alamat Badan Usaha</td><td>{{ $administrasi->alamat_badan_usaha }}</td></tr>
      <tr><td style="width: 30%">No. Telepon Badan Usaha</td><td>{{ $administrasi->no_telepon_badan_usaha }}</td></tr>
      <tr><td style="width: 30%">Email Badan Usaha</td><td>{{ $administrasi->email_badan_usaha }}</td></tr>
    </tbody>
  </table>

  <h5>Akta Pendirian Perusahaan</h5>
  @foreach($akta_pendirian_perusahaans as $akta_pendirian_perusahaan)
  <table class="table table-bordered">
    <tbody>
      <tr><td style="width: 30%">No. Pengesahan</td><td>{{ $akta_pendirian_perusahaan->no_pengesahan }}</td></tr>
      <tr><td style="width: 30%">Tanggal Pengesahan</td><td>{{ $akta_pendirian_perusahaan->tanggal_pengesahan }}</td></tr>
      <tr><td style="width: 30%">Nama Notaris</td><td>{{ $akta_pendirian_perusahaan->nama_notaris }}</td></tr>
    </tbody>
  </table>
  @endforeach

  <h5>Pengurus Badan Usaha</h5>
  @foreach($pengurus_badan_usahas as $pengurus_badan_usaha)
  <table class="table table-bordered">
    <tbody>
      <tr><td style="width: 30%">Nama Pengurus Badan Usaha</td><td>{{ $pengurus_badan_usaha->nama_pengurus_badan_usaha }}</td></tr>
      <tr><td style="width: 30%">No. KTP/ Paspor/ Keterangan Domisili Tinggal</td><td>{{ $pengurus_badan_usaha->no_ktp_paspor_keterangan_domisili_tinggal }}</td></tr>
      <tr>
        <td style="width: 30%">Jabatan</td>
        <td>
          @if($pengurus_badan_usaha->jabatan == 'komisaris')
            Komisaris
          @endif
          @if($pengurus_badan_usaha->jabatan == 'direksi')
            Direksi
          @endif
        </td>
      </tr>
      <tr><td style="width: 30%">Jabatan Pengurus Badan Usaha</td><td>{{ $pengurus_badan_usaha->jabatan_pengurus_badan_usaha }}</td></tr>
    </tbody>
  </table>
  @endforeach

  <h5>Tanda Daftar Usaha</h5>
  <table class="table table-bordered">
    <tbody>
      <tr><td style="width: 30%">Masa Berlaku Izin Usaha</td><td>{{ $tanda_daftar_usaha->masa_berlaku_izin_usaha }}</td></tr>
      <tr><td style="width: 30%">Instansi Izin Usaha</td><td>{{ $tanda_daftar_usaha->instansi_pemberi_izin_usaha }}</td></tr>
      <tr><td style="width: 30%">No. Tanda Daftar Usaha</td><td>{{ $tanda_daftar_usaha->no_tanda_daftar_usaha }}</td></tr>
      <tr><td style="width: 30%">Kualifikasi Usaha</td><td>{{ $tanda_daftar_usaha->kualifikasi_usaha }}</td></tr>
      <tr><td style="width: 30%">Klasifikasi Usaha</td><td>{{ $tanda_daftar_usaha->klasifikasi_usaha }}</td></tr>
    </tbody>
  </table>

  <h5>Susunan Kepemilikan Saham</h5>
  @foreach($susunan_kepemilikan_sahams as $susunan_kepemilikan_saham)
  <table class="table table-bordered">
    <tbody>
      <tr><td style="width: 30%">Nama Pemilik Saham</td><td>{{ $susunan_kepemilikan_saham->nama_pemilik_saham }}</td></tr>
      <tr><td style="width: 30%">No. KTP/ Paspor/ Keterangan Domisili Tinggal Pemilik Saham</td><td>{{ $susunan_kepemilikan_saham->no_ktp_paspor_keterangan_domisili_tinggal_pemilik_saham }}</td></tr>
      <tr><td style="width: 30%">Alamat Pemilik Saham</td><td>{{ $susunan_kepemilikan_saham->alamat_pemilik_saham }}</td></tr>
      <tr><td style="width: 30%">Persentase Kepemilikan Saham</td><td>{{ $susunan_kepemilikan_saham->persentase_kepemilikan_saham }}</td></tr>
    </tbody>
  </table>
  @endforeach

  <h5>Data Personalia</h5>
  @foreach($data_personalias as $data_personalia)
  <table class="table table-bordered">
    <tbody>
      <tr><td style="width: 30%">Nama</td><td>{{ $data_personalia->nama }}</td></tr>
      <tr><td style="width: 30%">Tanggal Lahir</td><td>{{ $data_personalia->tanggal_lahir }}</td></tr>
      <tr><td style="width: 30%">Jabatan</td><td>{{ $data_personalia->jabatan }}</td></tr>
      <tr><td style="width: 30%">Pengalaman Kerja</td><td>{{ $data_personalia->pengalaman_kerja }}</td></tr>
      <tr><td style="width: 30%">Profesi Keahlian</td><td>{{ $data_personalia->profesi_keahlian }}</td></tr>
      <tr><td style="width: 30%">Tahun Seritifikat Ijazah</td><td>{{ $data_personalia->tahun_sertifikat_ijazah }}</td></tr>
    </tbody>
  </table>
  @endforeach

  <h5>Data Fasilitas</h5>
  @foreach($data_fasilitasies as $data_fasilitas)
  <table class="table table-bordered">
    <tbody>
      <tr><td style="width: 30%">Jenis</td><td>{{ $data_fasilitas->jenis }}</td></tr>
      <tr><td style="width: 30%">Jumlah</td><td>{{ $data_fasilitas->jumlah }}</td></tr>
      <tr><td style="width: 30%">Kapasitas Pada Saat Ini</td><td>{{ $data_fasilitas->kapasitas_pada_saat_ini }}</td></tr>
      <tr><td style="width: 30%">Merek Dan Tipe</td><td>{{ $data_fasilitas->merek_dan_tipe }}</td></tr>
      <tr><td style="width: 30%">Tahun Pembuatan</td><td>{{ $data_fasilitas->tahun_pembuatan }}</td></tr>
      <tr><td style="width: 30%">Kondisi</td><td>{{ $data_fasilitas->kondisi }}</td></tr>
      <tr><td style="width: 30%">Lokasi</td><td>{{ $data_fasilitas->lokasi }}</td></tr>
    </tbody>
  </table>
  @endforeach
  
  <h5>Pengalaman Perusahaan</h5>
  @foreach($pengalaman_perusahaans as $pengalaman_perusahaan)
  <table class="table table-bordered">
    <tbody>
      <tr><td style="width: 30%">Nama Paket Pekerjaan</td><td>{{ $pengalaman_perusahaan->nama_paket_pekerjaan }}</td></tr>
      <tr><td style="width: 30%">Kelompok</td><td>{{ $pengalaman_perusahaan->kelompok }}</td></tr>
      <tr><td style="width: 30%">Ringkas Lingkup Paket Pekerjaan</td><td>{{ $pengalaman_perusahaan->ringkas_lingkup_paket_pekerjaan }}</td></tr>
      <tr><td style="width: 30%">Lokasi</td><td>{{ $pengalaman_perusahaan->lokasi }}</td></tr>
      <tr><td style="width: 30%">Nama Pemberi Pekerjaan</td><td>{{ $pengalaman_perusahaan->nama_pemberi_pekerjaan }}</td></tr>
      <tr><td style="width: 30%">Alamat Pemberi Pekerjaan</td><td>{{ $pengalaman_perusahaan->alamat_pemberi_pekerjaan }}</td></tr>
      <tr><td style="width: 30%">Tanggal Kontrak</td><td>{{ $pengalaman_perusahaan->tanggal_kontrak }}</td></tr>
      <tr><td style="width: 30%">Nilai Kontrak</td><td>{{ 'Rp. '.strrev(implode('.', str_split(strrev(strval($pengalaman_perusahaan->nilai_kontrak)), 3))) }}</td></tr>
      <tr><td style="width: 30%">Status Penyedia Pekerjaan</td><td>{{ $pengalaman_perusahaan->status_penyedia_pekerjaan }}</td></tr>
      <tr><td style="width: 30%">Tanggal Selesai Berdasarkan Kontrak</td><td>{{ $pengalaman_perusahaan->tanggal_selesai_berdasarkan_kontrak }}</td></tr>
      <tr><td style="width: 30%">Tanggal Selesai Berdasarkan BA Serah Terima</td><td>{{ $pengalaman_perusahaan->tanggal_selesai_berdasarkan_ba_serah_terima }}</td></tr>
    </tbody>
  </table>
  @endforeach

  <h5>Pekerjaan Yang Sedang Dilaksanakan</h5>
  @foreach($pekerjaan_yang_sedang_dilaksanakans as $pekerjaan_yang_sedang_dilaksanakan)
  <table class="table table-bordered">
    <tbody>
      <tr><td style="width: 30%">Nama Paket Pekerjaan</td><td>{{ $pekerjaan_yang_sedang_dilaksanakan->nama_paket_pekerjaan }}</td></tr>
      <tr><td style="width: 30%">Kelompok</td><td>{{ $pekerjaan_yang_sedang_dilaksanakan->kelompok }}</td></tr>
      <tr><td style="width: 30%">Ringkas Lingkup Paket Pekerjaan</td><td>{{ $pekerjaan_yang_sedang_dilaksanakan->ringkas_lingkup_paket_pekerjaan }}</td></tr>
      <tr><td style="width: 30%">Lokasi</td><td>{{ $pekerjaan_yang_sedang_dilaksanakan->lokasi }}</td></tr>
      <tr><td style="width: 30%">Nama Pemberi Pekerjaan</td><td>{{ $pekerjaan_yang_sedang_dilaksanakan->nama_pemberi_pekerjaan }}</td></tr>
      <tr><td style="width: 30%">Alamat Pemberi Pekerjaan</td><td>{{ $pekerjaan_yang_sedang_dilaksanakan->alamat_pemberi_pekerjaan }}</td></tr>
      <tr><td style="width: 30%">Tanggal Kontrak</td><td>{{ $pekerjaan_yang_sedang_dilaksanakan->tanggal_kontrak }}</td></tr>
      <tr><td style="width: 30%">Nilai Kontrak</td><td>{{ 'Rp. '.strrev(implode('.', str_split(strrev(strval($pekerjaan_yang_sedang_dilaksanakan->nilai_kontrak)), 3))) }}</td></tr>
      <tr><td style="width: 30%">Progres Terakhir Berdasarkan Kontrak</td><td>{{ $pekerjaan_yang_sedang_dilaksanakan->progres_terakhir_berdasarkan_kontrak }}</td></tr>
      <tr><td style="width: 30%">Progres Terakhir Berdasarkan Prestasi Kerja</td><td>{{ $pekerjaan_yang_sedang_dilaksanakan->progres_terakhir_berdasarkan_prestasi_kerja }}</td></tr>
    </tbody>
  </table>
  @endforeach

  <h5>Sisa Kemampuan Nyata</h5>
  <table class="table table-bordered">
    <tbody>
      <tr><td style="width: 30%">Kekayaan Bersih (KB)</td><td>{{ $sisa_kemampuan_nyata->kekayaan_bersih }}</td></tr>
      <tr><td style="width: 30%">Modal Kerja (MK)</td><td>{{ $sisa_kemampuan_nyata->modal_kerja }}</td></tr>
      <tr><td style="width: 30%">Kemampuan Nyata (KN)</td><td>{{ $sisa_kemampuan_nyata->kemampuan_nyata }}</td></tr>
      <tr><td style="width: 30%">Sisa Kemampuan Nyata (SKN)</td><td>{{ $sisa_kemampuan_nyata->sisa_kemampuan_nyata }}</td></tr>
    </tbody>
  </table>
</body>
</html>