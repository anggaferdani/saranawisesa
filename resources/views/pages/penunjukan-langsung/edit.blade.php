@extends('templates.pages')
@section('title')
@section('header')
<h1>Edit Penunjukan Langsung</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Edit Penunjukan Langsung</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @if(auth()->user()->level == 'superadmin')
          <form method="POST" action="{{ route('eproc.superadmin.penunjukan-langsung.update', $penunjukan_langsung->id) }}" class="needs-validation" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('eproc.admin.penunjukan-langsung.update', $penunjukan_langsung->id) }}" class="needs-validation" novalidate="">
        @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Jenis Pengadaan</label>
            <select class="form-control" name="jenis_pengadaan_id">
              <option selected value="{{ $penunjukan_langsung->jenis_pengadaan_id }}">{{ $penunjukan_langsung->jenis_pengadaans->jenis_pengadaan }}</option>
              @foreach ($jenis_pengadaan as $jenis_pengadaans)
                @if($jenis_pengadaans->status_aktif == 'aktif')
                  <option value="{{ $jenis_pengadaans->id }}">{{ $jenis_pengadaans->jenis_pengadaan }}</option>
                @endif
              @endforeach
              @error('jenis_pengadaan_id')<div class="text-danger">{{ $message }}</div>@enderror
            </select>
          </div>
          <div class="form-group">
            <label for="nama_lelang">Nama Lelang</label>
            <input id="nama_lelang" type="text" class="form-control" name="nama_lelang" value="{{ $penunjukan_langsung->nama_lelang }}">
            @error('nama_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="urian_singkat_pekerjaan">Uraian Singkat Pekerjaan</label>
            <input id="urian_singkat_pekerjaan" type="text" class="form-control" name="urian_singkat_pekerjaan" value="{{ $penunjukan_langsung->urian_singkat_pekerjaan }}">
            @error('urian_singkat_pekerjaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="tanggal_mulai_lelang">Tanggal Mulai Lelang</label>
            <input id="tanggal_mulai_lelang" type="date" class="form-control" name="tanggal_mulai_lelang" value="{{ $penunjukan_langsung->tanggal_mulai_lelang }}">
            @error('tanggal_mulai_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="tanggal_akhir_lelang">Tanggal Akhir Lelang</label>
            <input id="tanggal_akhir_lelang" type="date" class="form-control" name="tanggal_akhir_lelang" value="{{ $penunjukan_langsung->tanggal_akhir_lelang }}">
            @error('tanggal_akhir_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="jenis_kontrak">Jenis Kontrak</label>
            <input id="jenis_kontrak" type="text" class="form-control" name="jenis_kontrak" value="{{ $penunjukan_langsung->jenis_kontrak }}">
            @error('jenis_kontrak')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="lokasi_pekerjaan">Lokasi Pekerjaan</label>
            <input id="lokasi_pekerjaan" type="text" class="form-control" name="lokasi_pekerjaan" value="{{ $penunjukan_langsung->lokasi_pekerjaan }}">
            @error('lokasi_pekerjaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="hps">HPS</label>
            <input id="hps" type="number" class="form-control" name="hps" value="{{ $penunjukan_langsung->hps }}" onkeyup="formatNumber(this)">
            @error('hps')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="syarat_kualifikasi">Syarat Kualifikasi</label>
            <textarea id="syarat_kualifikasi" class="form-control ckeditor" name="syarat_kualifikasi">{{ $lelang->syarat_kualifikasi }}</textarea>
            @error('syarat_kualifikasi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label class="form-label">Lampiran Pengadaan</label>
            <div class="selectgroup selectgroup-pills">
              <label class="selectgroup-item">
                <input type="radio" name="lampiran_pengadaan" value="penawaran" class="selectgroup-input" {{ $lelang->lampiran_pengadaan == 'penawaran' ? 'checked': '' }}>
                <span class="selectgroup-button">Penawaran</span>
              </label>
              <label class="selectgroup-item">
                <input type="radio" name="lampiran_pengadaan" value="konsep" class="selectgroup-input" {{ $lelang->lampiran_pengadaan == 'konsep' ? 'checked': '' }}>
                <span class="selectgroup-button">Konsep</span>
              </label>
              <label class="selectgroup-item">
                <input type="radio" name="lampiran_pengadaan" value="penawaran_dan_konsep" class="selectgroup-input" {{ $lelang->lampiran_pengadaan == 'penawaran_dan_konsep' ? 'checked': '' }}>
                <span class="selectgroup-button">Penawaran Dan Konsep</span>
              </label>
            </div>
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('eproc.superadmin.penunjukan-langsung.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.penunjukan-langsung.index') }}" class="btn btn-secondary">Back</a>
          @endif
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection