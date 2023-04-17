@extends('templates.pages')
@section('title')
@section('header')
<h1>Edit Pengadaan</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Edit Pengadaan</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @if(auth()->user()->level == 'superadmin')
          <form method="POST" action="{{ route('eproc.superadmin.management-pengadaan.update', $pengadaan->id) }}" class="needs-validation" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('eproc.admin.management-pengadaan.update', $pengadaan->id) }}" class="needs-validation" novalidate="">
        @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nama_pengadaan">Nama Pengadaan</label>
            <input id="nama_pengadaan" type="text" class="form-control" name="nama_pengadaan" value="{{ $pengadaan->nama_pengadaan }}">
            @error('nama_pengadaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="jenis_pengadaan">Jenis Pengadaan</label>
            <select id="jenis_pengadaan" class="form-control" name="jenis_pengadaan">
              <option value="Gedung" @if($pengadaan->jenis_pengadaan == 'Gedung')selected="selected"@endif>Gedung</option>
              <option value="Sarana Prasarana" @if($pengadaan->jenis_pengadaan == 'Sarana Prasarana')selected="selected"@endif>Sarana Prasarana</option>
              @error('jenis_pengadaan')<div class="text-danger">{{ $message }}</div>@enderror
            </select>
          </div>
          <div class="form-group">
            <label for="hps">HPS</label>
            <input id="hps" type="number" class="form-control" name="hps" value="{{ $pengadaan->hps }}">
            @error('hps')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="tanggal_mulai_pengadaan">Tanggal Mulai Pengadaan</label>
            <input id="tanggal_mulai_pengadaan" type="date" class="form-control" name="tanggal_mulai_pengadaan" value="{{ $pengadaan->tanggal_mulai_pengadaan }}">
            @error('tanggal_mulai_pengadaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="tanggal_akhir_pengadaan">Tanggal Akhir Pengadaan</label>
            <input id="tanggal_akhir_pengadaan" type="date" class="form-control" name="tanggal_akhir_pengadaan" value="{{ $pengadaan->tanggal_akhir_pengadaan }}">
            @error('tanggal_akhir_pengadaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('eproc.superadmin.management-pengadaan.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.management-pengadaan.index') }}" class="btn btn-secondary">Back</a>
          @endif
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection