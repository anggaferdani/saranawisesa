@extends('templates.pages')
@section('title', 'Lelang')
@section('header')
<h1>Lelang</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Edit</h4>
      </div>
      <div class="card-body">
        @if(auth()->user()->level == 'superadmin')
          <form method="POST" action="{{ route('eproc.superadmin.lelang.update', Crypt::encrypt($lelang->id)) }}" class="needs-validation" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('eproc.admin.lelang.update', Crypt::encrypt($lelang->id)) }}" class="needs-validation" novalidate="">
        @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Jenis Pengadaan</label>
            <select class="form-control select2" name="jenis_pengadaan_id">
              @foreach ($jenis_pengadaans as $jenis_pengadaan)
                <option value="{{ $jenis_pengadaan->id }}" @if($lelang->jenis_pengadaan_id == $jenis_pengadaan->id)@selected(true)@endif>{{ $jenis_pengadaan->jenis_pengadaan }}</option>
              @endforeach
              @error('jenis_pengadaan_id')<div class="text-danger">{{ $message }}</div>@enderror
            </select>
          </div>
          <div class="form-group">
            <label>Nama Lelang</label>
            <input type="text" class="form-control" name="nama_lelang" value="{{ $lelang->nama_lelang }}">
            @error('nama_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Uraian Singkat Pekerjaan</label>
            <input type="text" class="form-control" name="uraian_singkat_pekerjaan" value="{{ $lelang->uraian_singkat_pekerjaan }}">
            @error('uraian_singkat_pekerjaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Tanggal Mulai Lelang</label>
            <input type="date" class="form-control" name="tanggal_mulai_lelang" value="{{ $lelang->tanggal_mulai_lelang }}">
            @error('tanggal_mulai_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Tanggal Akhir Lelang</label>
            <input type="date" class="form-control" name="tanggal_akhir_lelang" value="{{ $lelang->tanggal_akhir_lelang }}">
            @error('tanggal_akhir_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Jenis Kontrak</label>
            <input type="text" class="form-control" name="jenis_kontrak" value="{{ $lelang->jenis_kontrak }}">
            @error('jenis_kontrak')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Lokasi Pekerjaan</label>
            <input type="text" class="form-control" name="lokasi_pekerjaan" value="{{ $lelang->lokasi_pekerjaan }}">
            @error('lokasi_pekerjaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>HPS</label>
            <input type="number" class="form-control" name="hps" value="{{ $lelang->hps }}" onkeyup="formatNumber(this)">
            @error('hps')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Syarat Kualifikasi</label>
            <textarea class="form-control ckeditor" name="syarat_kualifikasi">{{ $lelang->syarat_kualifikasi }}</textarea>
            @error('syarat_kualifikasi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Lampiran Pengadaan</label>
            <select class="form-control select2" name="lampiran_pengadaan">
              <option selected disabled>Pilih</option>
              <option value="penawaran" @if($lelang->lampiran_pengadaan == 'penawaran')@selected(true)@endif>Penawaran</option>
              <option value="konsep" @if($lelang->lampiran_pengadaan == 'konsep')@selected(true)@endif>Konsep</option>
              <option value="penawaran dan konsep" @if($lelang->lampiran_pengadaan == 'penawaran dan konsep')@selected(true)@endif>Penawaran Dan Konsep</option>
            </select>
            @error('lampiran_pengadaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('eproc.superadmin.lelang.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.lelang.index') }}" class="btn btn-secondary">Back</a>
          @endif
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection