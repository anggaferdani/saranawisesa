@extends('templates.pages')
@section('title', 'Pengalaman Perusahaan')
@section('header')
<h1>Pengalaman Perusahaan</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Edit</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('eproc.perusahaan.pengalaman-perusahaan.update', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($pengalaman_perusahaan->id)]) }}" class="needs-validation" novalidate="">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Nama Paket Pekerjaan</label>
            <input type="text" class="form-control" name="nama_paket_pekerjaan" value="{{ $pengalaman_perusahaan->nama_paket_pekerjaan }}">
          </div>
          <div class="form-group">
            <label>Kelompok</label>
            <input type="text" class="form-control" name="kelompok" value="{{ $pengalaman_perusahaan->kelompok }}">
          </div>
          <div class="form-group">
            <label>Ringkas Lingkup Paket Pekerjaan</label>
            <input type="text" class="form-control" name="ringkas_lingkup_paket_pekerjaan" value="{{ $pengalaman_perusahaan->ringkas_lingkup_paket_pekerjaan }}">
          </div>
          <div class="form-group">
            <label>Lokasi</label>
            <input type="text" class="form-control" name="lokasi" value="{{ $pengalaman_perusahaan->lokasi }}">
          </div>
          <div class="form-group">
            <label>Nama Pemberi Pekerjaan</label>
            <input type="text" class="form-control" name="nama_pemberi_pekerjaan" value="{{ $pengalaman_perusahaan->nama_pemberi_pekerjaan }}">
          </div>
          <div class="form-group">
            <label>Alamat Pemberi Pekerjaan</label>
            <input type="text" class="form-control" name="alamat_pemberi_pekerjaan" value="{{ $pengalaman_perusahaan->alamat_pemberi_pekerjaan }}">
          </div>
          <div class="form-group">
            <label>Tanggal Kontrak</label>
            <input type="date" class="form-control" name="tanggal_kontrak" value="{{ $pengalaman_perusahaan->tanggal_kontrak }}">
          </div>
          <div class="form-group">
            <label>Nilai Kontrak</label>
            <input type="text" class="form-control" name="nilai_kontrak" value="{{ $pengalaman_perusahaan->nilai_kontrak }}" onkeyup="formatNumber(this)">
          </div>
          <div class="form-group">
            <label>Status Penyedia Pekerjaan</label>
            <input type="text" class="form-control" name="status_penyedia_pekerjaan" value="{{ $pengalaman_perusahaan->status_penyedia_pekerjaan }}">
          </div>
          <div class="form-group">
            <label>Tanggal Selesai Berdasarkan Kontrak</label>
            <input type="date" class="form-control" name="tanggal_selesai_berdasarkan_kontrak" value="{{ $pengalaman_perusahaan->tanggal_selesai_berdasarkan_kontrak }}">
          </div>
          <div class="form-group">
            <label>Tanggal Selesai Berdasarkan BA Serah Terima</label>
            <input type="date" class="form-control" name="tanggal_selesai_berdasarkan_ba_serah_terima" value="{{ $pengalaman_perusahaan->tanggal_selesai_berdasarkan_ba_serah_terima }}">
          </div>
          <a href="{{ route('eproc.perusahaan.pengalaman-perusahaan.index', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary">Back</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection