@extends('templates.pages')
@section('title', 'Pengadaan')
@section('header')
<h1>Pengadaan</h1>
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
            <label>Kode Lelang</label>
            <input disabled type="text" class="form-control" name="kode_lelang" value="{{ $lelang->kode_lelang }}">
            @error('kode_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Jenis Pengadaan</label>
            <input disabled type="text" class="form-control" name="jenis_pengadaan_id" value="{{ $lelang->jenis_pengadaans->jenis_pengadaan }}">
            @error('jenis_pengadaan_id')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Nama Lelang</label>
            <input disabled type="text" class="form-control" name="nama_lelang" value="{{ $lelang->nama_lelang }}">
            @error('nama_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Uraian Singkat Pekerjaan</label>
            <input disabled type="text" class="form-control" name="uraian_singkat_pekerjaan" value="{{ $lelang->uraian_singkat_pekerjaan }}">
            @error('uraian_singkat_pekerjaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Tanggal Mulai Lelang</label>
            <input disabled type="date" class="form-control" name="tanggal_mulai_lelang" value="{{ $lelang->tanggal_mulai_lelang }}">
            @error('tanggal_mulai_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Tanggal Akhir Lelang</label>
            <input disabled type="date" class="form-control" name="tanggal_akhir_lelang" value="{{ $lelang->tanggal_akhir_lelang }}">
            @error('tanggal_akhir_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Jenis Kontrak</label>
            <input disabled type="text" class="form-control" name="jenis_kontrak" value="{{ $lelang->jenis_kontrak }}">
            @error('jenis_kontrak')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Lokasi Pekerjaan</label>
            <input disabled type="text" class="form-control" name="lokasi_pekerjaan" value="{{ $lelang->lokasi_pekerjaan }}">
            @error('lokasi_pekerjaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>HPS</label>
            <input disabled type="number" class="form-control" name="hps" value="{{ $lelang->hps }}" onkeyup="formatNumber(this)">
            @error('hps')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Syarat Kualifikasi</label>
            <textarea disabled class="form-control ckeditor" name="syarat_kualifikasi">{{ $lelang->syarat_kualifikasi }}</textarea>
            @error('syarat_kualifikasi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Lampiran Pengadaan</label>
            <select disabled class="form-control select2" name="lampiran_pengadaan">
              <option selected disabled>Pilih</option>
              <option value="penawaran" @if($lelang->lampiran_pengadaan == 'penawaran')@selected(true)@endif>Penawaran</option>
              <option value="konsep" @if($lelang->lampiran_pengadaan == 'konsep')@selected(true)@endif>Konsep</option>
              <option value="penawaran dan konsep" @if($lelang->lampiran_pengadaan == 'penawaran dan konsep')@selected(true)@endif>Penawaran Dan Konsep</option>
            </select>
            @if($lelang->lampiran_pengadaan == 'penawaran')
              <a href="{{ asset('eproc/lampiran/penawaran/'.$lampiran['penawaran']) }}" target="_blank">{{ $lampiran->penawaran }}</a>
            @endif
            @if($lelang->lampiran_pengadaan == 'konsep')
              <a href="{{ asset('eproc/lampiran/konsep/'.$lampiran['konsep']) }}" target="_blank">{{ $lampiran->konsep }}</a>
            @endif
            @if($lelang->lampiran_pengadaan == 'penawaran dan konsep')
              <a href="{{ asset('eproc/lampiran/penawaran-dan-konsep/'.$lampiran['penawaran_dan_konsep']) }}" target="_blank">{{ $lampiran->penawaran_dan_konsep }}</a>
            @endif
            @error('lampiran_pengadaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Created At</label>
              <input disabled type="text" class="form-control" name="created_at" value="{{ $lelang->created_at }}">
              @error('created_at')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="form-group col-md-6">
              <label>Updated At</label>
              <input disabled type="text" class="form-control" name="updated_at" value="{{ $lelang->updated_at }}">
              @error('updated_at')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          </div>
          <a href="{{ route('eproc.perusahaan.pengadaan.index') }}" class="btn btn-secondary">Back</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection