@extends('templates.pages')
@section('title', 'Pekerjaan Yang Sedang Dilaksanakan')
@section('header')
<h1>Pekerjaan Yang Sedang Dilaksanakan</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Show</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="" class="needs-validation" novalidate="">
          @csrf
          <div class="form-group">
            <label>Nama Paket Pekerjaan</label>
            <input disabled type="text" class="form-control" name="nama_paket_pekerjaan" value="{{ $pekerjaan_yang_sedang_dilaksanakan->nama_paket_pekerjaan }}">
          </div>
          <div class="form-group">
            <label>Kelompok</label>
            <input disabled type="text" class="form-control" name="kelompok" value="{{ $pekerjaan_yang_sedang_dilaksanakan->kelompok }}">
          </div>
          <div class="form-group">
            <label>Ringkas Lingkup Paket Pekerjaan</label>
            <input disabled type="text" class="form-control" name="ringkas_lingkup_paket_pekerjaan" value="{{ $pekerjaan_yang_sedang_dilaksanakan->ringkas_lingkup_paket_pekerjaan }}">
          </div>
          <div class="form-group">
            <label>Lokasi</label>
            <input disabled type="text" class="form-control" name="lokasi" value="{{ $pekerjaan_yang_sedang_dilaksanakan->lokasi }}">
          </div>
          <div class="form-group">
            <label>Nama Pemberi Pekerjaan</label>
            <input disabled type="text" class="form-control" name="nama_pemberi_pekerjaan" value="{{ $pekerjaan_yang_sedang_dilaksanakan->nama_pemberi_pekerjaan }}">
          </div>
          <div class="form-group">
            <label>Alamat Pemberi Pekerjaan</label>
            <input disabled type="text" class="form-control" name="alamat_pemberi_pekerjaan" value="{{ $pekerjaan_yang_sedang_dilaksanakan->alamat_pemberi_pekerjaan }}">
          </div>
          <div class="form-group">
            <label>Tanggal Kontrak</label>
            <input disabled type="date" class="form-control" name="tanggal_kontrak" value="{{ $pekerjaan_yang_sedang_dilaksanakan->tanggal_kontrak }}">
          </div>
          <div class="form-group">
            <label>Nilai Kontrak</label>
            <input disabled type="text" class="form-control" name="nilai_kontrak" value="{{ $pekerjaan_yang_sedang_dilaksanakan->nilai_kontrak }}" onkeyup="formatNumber(this)">
          </div>
          <div class="form-group">
            <label>Progres Terakhir Berdasarkan Kontrak</label>
            <input disabled type="text" class="form-control" name="progres_terakhir_berdasarkan_kontrak" value="{{ $pekerjaan_yang_sedang_dilaksanakan->progres_terakhir_berdasarkan_kontrak }}">
          </div>
          <div class="form-group">
            <label>Progres Terakhir Berdasarkan Prestasi Kerja</label>
            <input disabled type="text" class="form-control" name="progres_terakhir_berdasarkan_prestasi_kerja" value="{{ $pekerjaan_yang_sedang_dilaksanakan->progres_terakhir_berdasarkan_prestasi_kerja }}">
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('eproc.superadmin.pekerjaan-yang-sedang-dilaksanakan.index', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.pekerjaan-yang-sedang-dilaksanakan.index', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'perusahaan')
            <a href="{{ route('eproc.perusahaan.pekerjaan-yang-sedang-dilaksanakan.index', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary">Back</a>
          @endif
        </form>
      </div>
    </div>
  </div>
</div>
@endsection